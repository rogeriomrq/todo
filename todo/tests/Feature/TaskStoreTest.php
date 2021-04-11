<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskStoreTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    protected Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->task = new Task;
    }

    public function testItCanStore()
    {
        $taskTest = $this->task::factory()->make();

        $this->actingAs($taskTest->user)
            ->post('/api/tasks', $taskTest->attributesToArray())
            ->assertJsonFragment($taskTest->attributesToArray())
            ->assertCreated();
    }

    public function testItCanNotStoreWithoutTitle()
    {
        $taskTest = $this->task::factory()->make();

        $this->actingAs($taskTest->user)
            ->json(
                'post',
                '/api/tasks',
                $taskTest->only(['description', 'task_type_id'])
            )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testItCanNotStoreWithoutTaskTypeId()
    {
        $taskTest = $this->task::factory()->make();

        $this->actingAs($taskTest->user)
            ->json(
                'post',
                '/api/tasks',
                $taskTest->only(['description', 'task_type_id'])
            )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
