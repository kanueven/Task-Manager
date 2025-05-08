<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        $tasks = Task::where('user_id',Auth::id())->latest()->take(5)->get();
        return view('home',compact('tasks'));
    })->name('home');
    Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
    // Route::resource('tasks', \App\Http\Controllers\TaskController::class);
});

