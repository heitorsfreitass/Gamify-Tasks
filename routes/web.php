<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserRewardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/scoreboard', [DashboardController::class, 'scoreboard'])->middleware(['auth', 'verified'])->name('scoreboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('user-rewards/{userId}/add-points', [UserRewardController::class, 'showForm']);
Route::get('user-rewards/{userId}', [UserRewardController::class, 'show']);
Route::post('user-rewards/{userId}/add-points', [UserRewardController::class, 'addPoints']);

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/{task}/update-details', [TaskController::class, 'updateDetails'])->name('tasks.updateDetails');

    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

require __DIR__.'/auth.php';
