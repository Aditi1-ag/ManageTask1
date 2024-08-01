<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        // dd(auth()->user()->name);
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validation = Task::validate($request->all());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validation = Task::validate($request->all());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
