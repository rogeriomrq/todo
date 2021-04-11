<?php

namespace App\Http\Controllers;

use App\Models\TaskType;
use Illuminate\Http\Request;

/**
 * Class TaskTypeController
 * @package App\Http\Controllers
 */
class TaskTypeController extends Controller
{
    protected TaskType $taskType;

    /**
     * TaskTypeController constructor.
     * @param TaskType $taskType
     */
    public function __construct(TaskType $taskType)
    {
        $this->taskType = $taskType;
    }

    /**
     * @return App\Models\TaskType
     */
    public function index()
    {
        return $this->taskType->get();
    }
}
