<?php

use App\Http\Controllers\Management\ManagementController;
use App\Http\Controllers\Management\JobPostingController;
use App\Http\Controllers\Management\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Management Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:management'])->prefix('management')->group(function () {
    // Dashboard
    Route::get('/', [ManagementController::class, 'dashboard'])->name('mgt.dashboard');

    // Job Postings
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('management.job_postings');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('management.create_job_posting');
    Route::post('/job-postings', [JobPostingController::class, 'store'])->name('management.store_job_posting');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('management.edit_job_posting');
    Route::put('/job-postings/{id}', [JobPostingController::class, 'update'])->name('management.update_job_posting');
    Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy'])->name('management.delete_job_posting');

    // Applicant Management
    Route::get('/applicants', [ManagementController::class, 'index'])->name('management.applicant_list');
    Route::get('/applicants/{id}', [ManagementController::class, 'show'])->name('management.view_applicant');
    Route::get('/applicants/filter', [ManagementController::class, 'filter'])->name('management.filter_applicants');

    // Application Management
    Route::get('/applications', [ApplicationController::class, 'index'])->name('management.view_applications');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('management.view_application');
    Route::put('/applications/{id}/status', [ApplicationController::class, 'updateStatus'])->name('management.update_application_status');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('management.delete_application');

    // Interview Scheduling
    Route::get('/interviews', [ManagementController::class, 'index'])->name('management.interviews');
    Route::get('/interviews/schedule', [ManagementController::class, 'create'])->name('management.schedule_interview');
    Route::post('/interviews', [ManagementController::class, 'store'])->name('management.store_interview');
    Route::get('/interviews/{id}/reschedule', [ManagementController::class, 'edit'])->name('management.reschedule_interview');
    Route::put('/interviews/{id}', [ManagementController::class, 'update'])->name('management.update_interview');

    // Reports & Analytics
    Route::get('/reports', [ManagementController::class, 'index'])->name('management.reports');
    Route::get('/analytics', [ManagementController::class, 'analytics'])->name('management.analytics');

    // Notifications
    Route::get('/notifications', [ManagementController::class, 'index'])->name('management.notifications');
});