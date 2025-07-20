<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function listTasks()
    {
        $tasks = Task::all();
        return view("home", compact('tasks'));
    }

    function addTask()
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'description' => 'required',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;

        if ($task->save()) {
            return redirect(route("home"))->with("success", "Task added successfully");
        }

        return redirect(route("task.add"))->with("error", "Task not added");
    }
}
