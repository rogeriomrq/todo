<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskIndexTest extends TestCase
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

    public function testItCanIndex()
    {
        $taskTest = $this->task::factory()->create();

        $this->actingAs($taskTest->user)
            ->get('/api/tasks/')
            ->assertOk();
    }
}
