<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Events\TaskCreated;
use App\Notifications\TaskAssigned;



class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(Request $request)
    {
        $validation = Task::validate($request->all());
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $task = Task::create($request->all());
        $task->user->notify(new TaskAssigned($task));
        broadcast(new TaskCreated($task));
        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(Request $request, Task $task)
    {
        $validation = Task::validate($request->all());
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $task->update($request->all());
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}
