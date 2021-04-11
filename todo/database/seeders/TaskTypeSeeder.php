<?php

namespace Database\Seeders;

use App\Models\TaskType;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskType::factory()->create(['type' => 'To Do']);
        TaskType::factory()->create(['type' => 'In Progress']);
        TaskType::factory()->create(['type' => 'In Review']);
        TaskType::factory()->create(['type' => 'Done']);
    }
}
