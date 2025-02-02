<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobPostingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Applicant Management
    Route::get('/applicants', [AdminController::class, 'index'])->name('admin.applicant_list');
    Route::get('/applicants/{id}', [AdminController::class, 'show'])->name('admin.view_applicant');
    Route::get('/applicants/filter', [AdminController::class, 'filter'])->name('admin.filter_applicants');

    // Job Postings
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('admin.job_postings');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('admin.create_job_posting');
    Route::post('/job-postings', [JobPostingController::class, 'store'])->name('admin.store_job_posting');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('admin.edit_job_posting');
    Route::put('/job-postings/{id}', [JobPostingController::class, 'update'])->name('admin.update_job_posting');
    Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy'])->name('admin.delete_job_posting');

    // Application Management
    Route::get('/applications', [AdminController::class, 'index'])->name('admin.view_applications');
    Route::get('/applications/{id}', [AdminController::class, 'show'])->name('admin.view_application');
    Route::put('/applications/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.update_application_status');
    Route::delete('/applications/{id}', [AdminController::class, 'destroy'])->name('admin.delete_application');

    // Interview Scheduling
    Route::get('/interviews', [AdminController::class, 'index'])->name('admin.interviews');
    Route::get('/interviews/schedule', [AdminController::class, 'create'])->name('admin.schedule_interview');
    Route::post('/interviews', [AdminController::class, 'store'])->name('admin.store_interview');
    Route::get('/interviews/{id}/reschedule', [AdminController::class, 'edit'])->name('admin.reschedule_interview');
    Route::put('/interviews/{id}', [AdminController::class, 'update'])->name('admin.update_interview');

    // Document Management
    Route::get('/documents', [AdminController::class, 'index'])->name('admin.documents');
    Route::post('/documents/upload', [AdminController::class, 'upload'])->name('admin.upload_documents');

    // Reports & Analytics
    Route::get('/reports', [AdminController::class, 'index'])->name('admin.reports');
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');

    // Notifications
    Route::get('/notifications', [AdminController::class, 'index'])->name('admin.notifications');
});