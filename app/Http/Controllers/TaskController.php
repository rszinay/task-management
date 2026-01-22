<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
         $data = $request->validate([
             'title' => 'required',
             'description' => 'required',
             'status' => 'required',
             'deadline_at' => 'required',
             'user_id' => 'required',
         ]);

         Task::create($data);

         return redirect('/');
    }

    public function showCreateTask()
    {
        return view('tasks.create-task');
    }

    public function showEditTask(Task $task)
    {
        if(auth()->user()->id !== $task->user_id){
            return redirect('/');
        }

        return view('tasks.edit-task', ['task' => $task]);
    }

    public function updateTask(Request $request, Task $task)
    {
        if(auth()->user()->id !== $task->user_id){
            return redirect('/');
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task->update($data);

        return redirect('/');
    }

    public function deleteTask(Task $task)
    {
        if(auth()->user()->id === $task->user_id){
            $task->delete();
        }

        return redirect('/');
    }
}
