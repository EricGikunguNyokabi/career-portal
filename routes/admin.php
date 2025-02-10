<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JobPostingController;

// HR routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('admin.user_list'); // List users
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.create_user'); // Create user
    Route::post('/users', [UserController::class, 'store'])->name('admin.store_user'); // Store new user
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.edit_user'); // Edit user
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.update_user'); // Update user
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.delete_user'); // Delete user


    // Job Postings
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('admin.job_postings');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('admin.create_job_posting');
    Route::post('/job-postings', [JobPostingController::class, 'store'])->name('admin.store_job_posting');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('admin.edit_job_posting');
    Route::put('/job-postings/{id}', [JobPostingController::class, 'update'])->name('admin.update_job_posting');
    Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy'])->name('admin.delete_job_posting');

    // Audit logs
    // Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('admin.audit_logs.index');

    



});
