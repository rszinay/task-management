<?php

namespace App\Http\Controllers;

use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Home page
     *
     * When not logged in, form with login displayed.
     * When logged in, home page is displayed.
     * This is managed in in the template.
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::all();
        $statuses = Task::$statusLabels;
        return view('home', ['tasks' => $tasks, 'statuses' => $statuses]);
    }
}
