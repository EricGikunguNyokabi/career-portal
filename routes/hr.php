<?php

use App\Http\Controllers\HR\HRController;
use App\Http\Controllers\HR\JobPostingController;
use App\Http\Controllers\HR\ApplicationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HR Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:hr'])->prefix('hr')->group(function () {
    // Dashboard
    Route::get('/', [HRController::class, 'dashboard'])->name('hr.dashboard');

    // Job Postings
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('hr.job_postings');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('hr.create_job_posting');
    Route::post('/job-postings', [JobPostingController::class, 'store'])->name('hr.store_job_posting');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('hr.edit_job_posting');
    Route::put('/job-postings/{id}', [JobPostingController::class, 'update'])->name('hr.update_job_posting');
    Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy'])->name('hr.delete_job_posting');

    // Applicant Management
    Route::get('/applicants', [HRController::class, 'index'])->name('hr.applicant_list');
    Route::get('/applicants/{id}', [HRController::class, 'show'])->name('hr.view_applicant');
    Route::get('/applicants/filter', [HRController::class, 'filter'])->name('hr.filter_applicants');

    // Application Management
    Route::get('/applications', [ApplicationController::class, 'index'])->name('hr.view_applications');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('hr.view_application');
    Route::put('/applications/{id}/status', [ApplicationController::class, 'updateStatus'])->name('hr.update_application_status');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('hr.delete_application');

    // Interview Scheduling
    Route::get('/interviews', [HRController::class, 'index'])->name('hr.interviews');
    Route::get('/interviews/schedule', [HRController::class, 'create'])->name('hr.schedule_interview');
    Route::post('/interviews', [HRController::class, 'store'])->name('hr.store_interview');
    Route::get('/interviews/{id}/reschedule', [HRController::class, 'edit'])->name('hr.reschedule_interview');
    Route::put('/interviews/{id}', [HRController::class, 'update'])->name('hr.update_interview');

    // Document Management
    Route::get('/documents', [HRController::class, 'index'])->name('hr.documents');
    Route::post('/documents/upload', [HRController::class, 'upload'])->name('hr.upload_documents');

    // Reports & Analytics
    Route::get('/reports', [HRController::class, 'index'])->name('hr.reports');
    Route::get('/analytics', [HRController::class, 'analytics'])->name('hr.analytics');

    // Notifications
    Route::get('/notifications', [HRController::class, 'index'])->name('hr.notifications');
});