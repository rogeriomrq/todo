<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => Str::random(10),
            'task_type_id' => TaskType::factory(),
            'title' => Str::random(10),
            'user_id' => User::factory(),
        ];
    }
}
