<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskUpdateTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    protected Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->task = new Task;
    }

    public function testItCanUpdate()
    {
        $taskTest = $this->task::factory()->create();
        $taskTest2 = $this->task::factory()->make();

        $this->actingAs($taskTest->user)
            ->put(
                '/api/tasks/' . $taskTest->id,
                $taskTest2->attributesToArray()
            )->assertJsonFragment([
                'description' => $taskTest2->description,
                'id' => $taskTest->id,
                'task_type_id' => $taskTest2->task_type_id,
                'title' => $taskTest2->title
            ])
            ->assertOk();
    }

    public function testItCanNotUpdateTaskFromAnotherUser()
    {
        $taskTest = $this->task::factory()->create();
        $taskTest2 = $this->task::factory()->make();

        $this->actingAs($taskTest2->user)
            ->put(
                '/api/tasks/' . $taskTest->id,
                $taskTest2->attributesToArray()
            )->assertNotFound();
    }
}
