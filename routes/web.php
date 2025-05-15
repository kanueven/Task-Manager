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
        $tasks = Task::where('user_id', Auth::id())->take(5)->get();
        $totalTasks = Task::where('user_id', Auth::id())->count();
        $completedTasks = Task::where('user_id', Auth::id())->where('status', 'completed')->count();
        $pendingTasks = Task::where('user_id', Auth::id())->where('status', '!=', 'completed')->count();
        $inProgressTasks = Task::where('user_id', Auth::id())->where('status', 'in progress')->count();

        $completedRate = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
        return view('home', compact('tasks', 'completedRate','totalTasks', 'completedTasks', 'pendingTasks','inProgressTasks'));
    })->name('home');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    // Route::resource('tasks', \App\Http\Controllers\TaskController::class);
});

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard.admin');
    });
});
