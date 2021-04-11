<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskDeleteTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    protected Task $task;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->task = new Task;
        $this->user = new User;
    }

    public function testItCanDelete()
    {
        $taskTest = $this->task::factory()->create();

        $this->actingAs($taskTest->user)
            ->delete('/api/tasks/' . $taskTest->id)
            ->assertNoContent();

        $this->assertDatabaseMissing(
            'tasks',
            $taskTest->attributesToArray()
        );
    }

    public function testItCanNotDeleteFromAnotherUser()
    {
        $taskTest = $this->task::factory()->create();
        $userTest = $this->user::factory()->create();

        $this->actingAs($userTest)
            ->delete('/api/tasks/' . $taskTest->id)
            ->assertNotFound();

        $this->assertDatabaseHas(
            'tasks',
            $taskTest->attributesToArray()
        );
    }
}
