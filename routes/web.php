<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = Task::all();
    return view('home', ['tasks' => $tasks]);
});


Route::get('/register', [UserController::class, 'showRegisterUserForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Task related routes
Route::get('/create-task', [TaskController::class, 'showCreateTask']);
Route::get('/create-task', [TaskController::class, 'showCreateTask']);
Route::post('/create-task', [TaskController::class, 'createTask']);
Route::get('/edit-task/{task}', [TaskController::class, 'showEditTask']);
Route::put('/edit-task/{task}', [TaskController::class, 'updateTask']);
Route::delete('/delete-task/{task}', [TaskController::class, 'deleteTask']);
