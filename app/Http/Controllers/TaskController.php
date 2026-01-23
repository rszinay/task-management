<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Save new task from the form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createTask(Request $request)
    {
         $data = $request->validate([
             'title' => 'required',
             'description' => 'required|string|min:10',
             'status' => 'required',
             'deadline_at' => 'required',
             'user_id' => 'required',
         ]);

         Task::create($data);

         return redirect('/');
    }

    /**
     * Show form to create new task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateTask()
    {
        $users = User::all();
        $statuses = Task::$statuses;

        return view('tasks.create-task', ['users' => $users, 'statuses' => $statuses]);
    }

    /**
     * Show form to edit task
     * This page is opened by the 'Edit' button
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showEditTask(Task $task)
    {
        // Only owner of the task can edit the task
        if(auth()->user()->id !== $task->user_id){
            return redirect('/');
        }

        $users = User::all();
        $statuses = Task::$statuses;

        return view('tasks.edit-task', ['task' => $task, 'statuses' => $statuses, 'users' => $users]);
    }

    /**
     * Save task from update task form
     *
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTask(Request $request, Task $task)
    {
        // Only owner of the task can update the task
        if(auth()->user()->id !== $task->user_id){
            return redirect('/');
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required|string|min:10',
            'status' => 'required',
            'deadline_at' => 'required',
            'user_id' => 'required',
        ]);

        $task->update($data);

        return redirect('/');
    }

    /**
     * Delete task
     * This action is triggered by the 'delete' button
     *
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTask(Task $task)
    {
        // Only owner of the task can remove it
        if(auth()->user()->id === $task->user_id){
            $task->delete();
        }

        return redirect('/');
    }

    /**
     * Show task data in read only mode
     * This page is opened by 'Read' button
     * The page is available for users, which are not owning this task
     *
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showTasksReadOnly(Task $task)
    {
        $statuses = Task::$statusLabels;
        return view('tasks.task-read-only', ['task' => $task, 'statuses' => $statuses]);
    }
}
