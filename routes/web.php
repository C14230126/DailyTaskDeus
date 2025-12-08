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
    Route::get('/announcements', [AdminDashboardController::class, 'announcements'])->name('admin.announcements');
    Route::post('/announcements', [AdminDashboardController::class, 'storeAnnouncement'])->name('admin.announcements.store');
    Route::put('/announcements/{id}', [AdminDashboardController::class, 'updateAnnouncement'])->name('admin.announcements.update');
    Route::delete('/announcements/{id}', [AdminDashboardController::class, 'destroyAnnouncement'])->name('admin.announcements.destroy');
    Route::get('/leaves', [AdminDashboardController::class, 'leaves'])->name('admin.leaves');
    Route::put('/leaves/{id}', [AdminDashboardController::class, 'updateLeave'])->name('admin.leaves.update');
    Route::post('/leaves/{id}/approve', [AdminDashboardController::class, 'approveLeave'])->name('admin.leaves.approve');
    Route::post('/leaves/{id}/reject', [AdminDashboardController::class, 'rejectLeave'])->name('admin.leaves.reject');
    Route::post('/leaves/store', [AdminDashboardController::class, 'storeLeave'])->name('admin.leaves.store');
    Route::post('/dashboard/task', [AdminDashboardController::class, 'storeTask'])->name('admin.dashboard.storeTask');
    Route::put('/dashboard/task/{task}', [AdminDashboardController::class, 'updateTask'])->name('admin.dashboard.updateTask');
    Route::post('/dashboard/task/{task}/approve', [AdminDashboardController::class, 'approveTask'])->name('admin.dashboard.approveTask');
    Route::delete('/all-tasks/{task}', [AdminDashboardController::class, 'destroyTask'])->name('admin.all-tasks.destroy');
    Route::get('/team', [AdminDashboardController::class, 'team'])->name('admin.team');
    Route::put('/team/{id}/role', [AdminDashboardController::class, 'updateUserRole'])->name('admin.team.updateRole');
    Route::delete('/team/{id}', [AdminDashboardController::class, 'destroyUser'])->name('admin.team.destroy');
    Route::post('/team/{id}/reset-password', [AdminDashboardController::class, 'resetUserPassword'])->name('admin.team.reset-password');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('admin.settings');
    Route::put('/settings/profile', [AdminDashboardController::class, 'updateProfile'])->name('admin.settings.updateProfile');
    Route::post('/settings/reset-password', [AdminDashboardController::class, 'resetPassword'])->name('admin.settings.resetPassword');
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
    Route::get('/announcements', [UserDashboardController::class, 'announcements'])->name('user.announcements');
    Route::get('/leaves', [UserDashboardController::class, 'leaves'])->name('user.leaves');
    Route::post('/leaves', [UserDashboardController::class, 'storeLeave'])->name('user.leaves.store');
    Route::put('/leaves/{id}', [UserDashboardController::class, 'updateLeave'])->name('user.leaves.update');
    Route::delete('/leaves/{id}', [UserDashboardController::class, 'destroyLeave'])->name('user.leaves.destroy');
    Route::post('/dashboard/task', [UserDashboardController::class, 'storeTask'])->name('user.dashboard.storeTask');
    Route::put('/dashboard/task/{task}', [UserDashboardController::class, 'updateTask'])->name('user.dashboard.updateTask');
    Route::delete('/tasks/{task}', [UserDashboardController::class, 'destroyTask'])->name('user.tasks.destroy');
    Route::get('/settings', [UserDashboardController::class, 'settings'])->name('user.settings');
    Route::put('/settings/profile', [UserDashboardController::class, 'updateProfile'])->name('user.settings.updateProfile');
    Route::post('/settings/reset-password', [UserDashboardController::class, 'resetPassword'])->name('user.settings.resetPassword');
});

// Logout route (accessible by both admin and user)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('user');