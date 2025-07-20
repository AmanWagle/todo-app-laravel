<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Controller
{
    function listTasks()
    {
        // $tasks = Task::all();
        // $tasks = Task::where('is_completed', false)->get();
        $tasks = Task::where('user_id', Auth::user()->id)->where('is_completed', false)->paginate(3);
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
        $task->user_id = Auth::user()->id;

        if ($task->save()) {
            return redirect(route("home"))->with("success", "Task added successfully");
        }

        return redirect(route("task.add"))->with("error", "Task not added");
    }

    function updateTaskStatus($id)
    {
        if (Task::where('user_id', Auth::user()->id)->where('id', $id)->update(['is_completed' => true])) {
            return redirect(route("home"))->with("success", "Task is marked completed");
        }
        return redirect(route("home"))->with("error", "Error while updating task. Please try again later.");
    }

    function deleteTask($id)
    {
        if (Task::where('user_id', Auth::user()->id)->where('id', $id)->delete()) {
            return redirect(route("home"))->with("success", "Task deleted successfully");
        }
        return redirect(route("home"))->with("error", "Error while deleting the task. Please try again later.");
    }
}
