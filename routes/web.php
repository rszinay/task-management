<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Home page
Route::get('/', [HomeController::class, 'index']);

// User registration and login
Route::get('/register', [UserController::class, 'showRegisterUserForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Task related routes
Route::prefix('/task')->group(function () {
    Route::get('/create', [TaskController::class, 'showCreateTask']);
    Route::post('/create', [TaskController::class, 'createTask']);
    Route::get('/read/{task}', [TaskController::class, 'showTasksReadOnly']);
    Route::get('/edit/{task}', [TaskController::class, 'showEditTask']);
    Route::put('/edit/{task}', [TaskController::class, 'updateTask']);
    Route::delete('/delete/{task}', [TaskController::class, 'deleteTask']);
});
