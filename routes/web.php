<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Admin routes
Route::middleware(['user', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/all-tasks', [AdminDashboardController::class, 'tasks'])->name('admin.all-tasks');
    Route::post('/dashboard/task', [AdminDashboardController::class, 'storeTask'])->name('admin.dashboard.storeTask');
    Route::put('/dashboard/task/{task}', [AdminDashboardController::class, 'updateTask'])->name('admin.dashboard.updateTask');
    Route::post('/dashboard/task/{task}/approve', [AdminDashboardController::class, 'approveTask'])->name('admin.dashboard.approveTask');
    Route::delete('/all-tasks/{task}', [AdminDashboardController::class, 'destroyTask'])->name('admin.all-tasks.destroy');
    Route::resource('tasks', TaskController::class)->names([
        'index' => 'admin.tasks.index',
        'create' => 'admin.tasks.create',
        'store' => 'admin.tasks.store',
        'edit' => 'admin.tasks.edit',
        'update' => 'admin.tasks.update',
        'destroy' => 'admin.tasks.destroy',
    ]);
});

// User routes
Route::middleware('user')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/tasks', [UserDashboardController::class, 'tasks'])->name('user.tasks');
    Route::post('/dashboard/task', [UserDashboardController::class, 'storeTask'])->name('user.dashboard.storeTask');
    Route::put('/dashboard/task/{task}', [UserDashboardController::class, 'updateTask'])->name('user.dashboard.updateTask');
    Route::delete('/tasks/{task}', [UserDashboardController::class, 'destroyTask'])->name('user.tasks.destroy');
});

// Logout route (accessible by both admin and user)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('user');