<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected Task $task;

    /**
     * @param Task $task
     */
    public function __construct(Task $task) {
        $this->task = $task;
    }

    /**
     * @param $id
     * @return App\Models\Task
     */
    public function delete($id)
    {
        $model = $this->task->find($id);

        if (!$model) return response()->json(null, Response::HTTP_NOT_FOUND);

        $model->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @return App\Models\Task
     */
    public function index()
    {
        return $this->task->get();
    }

    /**
     * @param Request $request
     * @return App\Models\Task
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'task_type_id' => 'exists:App\Models\TaskType,id',
           'title' => 'required',
        ]);

        $model = $this->task->fill($request->only(['title','description']));
        $model->user()->associate(auth()->user());
        $model->taskType()->associate($request->task_type_id);
        $model->save();

        return $model;
    }

    /**
     * @param Request $request
     * @param $id
     * @return App\Models\Task
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'task_type_id' => 'exists:App\Models\TaskType,id',
        ]);

        $model = $this->task->find($id);

        if (!$model) return response()->json(null, Response::HTTP_NOT_FOUND);

        $model = $model->fill($request->only(['title','description']));

        if ($request->has('task_type_id')) {
            $model->taskType()->associate($request->task_type_id);
        }

        $model->save();

        return $model;
    }
}
