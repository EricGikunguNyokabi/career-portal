<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HR\HRController;
use App\Http\Controllers\HR\ApplicantController;

// HR routes
Route::prefix('hr')->middleware(['auth', 'role:hr_team'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [HRController::class, 'dashboard'])->name('hr.dashboard');

    // APPLICANT MANAGEMENT
    Route::get('/applicant-list', [ApplicantController::class, 'index'])->name('hr.applicant_list');
    Route::get('/applicant/{id}', [ApplicantController::class, 'index'])->name('hr.view_applicant');
    Route::get('/applicant/filter', [ApplicantController::class, 'filter'])->name('hr.filter_applicants');
    
    // JOB POSTINGS
    Route::get('/job-postings', [HRController::class, 'job_postings'])->name('hr.job_postings');
    Route::get('/job-postings/create', [HRController::class, 'create_job_posting'])->name('hr.create_job_posting');
    Route::post('/job-postings/store', [HRController::class, 'store_job_posting'])->name('hr.store_job_posting');
    Route::get('/job-postings/{id}/edit', [HRController::class, 'edit_job_posting'])->name('hr.edit_job_posting');
    Route::put('/job-postings/{id}/update', [HRController::class, 'update_job_posting'])->name('hr.update_job_posting');
    Route::delete('/job-postings/{id}/delete', [HRController::class, 'delete_job_posting'])->name('hr.delete_job_posting');
    Route::get('/job-postings/filter', [HRController::class, 'filter_job_postings'])->name('hr.filter_job_postings');

    // APPLICATION MANAGEMENT
    Route::get('/applications', [HRController::class, 'view_applications'])->name('hr.view_applications');
    Route::get('/application/{id}', [HRController::class, 'view_application'])->name('hr.view_application');
    Route::post('/application/{id}/update-status', [HRController::class, 'update_application_status'])->name('hr.update_application_status');
    Route::delete('/application/{id}/delete', [HRController::class, 'delete_application'])->name('hr.delete_application');

    // REPORTS & ANALYTICS
    Route::get('/reports', [HRController::class, 'reports'])->name('hr.reports');
    Route::get('/analytics', [HRController::class, 'analytics'])->name('hr.analytics');

    // NOTIFICATIONS
    Route::get('/notifications', [HRController::class, 'notifications'])->name('hr.notifications');

    // INTERVIEW SCHEDULING
    Route::get('/interviews', [HRController::class, 'interviews'])->name('hr.interviews');
    Route::post('/interviews/schedule', [HRController::class, 'schedule_interview'])->name('hr.schedule_interview');
    Route::post('/interviews/reschedule', [HRController::class, 'reschedule_interview'])->name('hr.reschedule_interview');

    // DOCUMENT MANAGEMENT
    Route::get('/documents', [HRController::class, 'documents'])->name('hr.documents');
    Route::post('/documents/upload', [HRController::class, 'upload_documents'])->name('hr.upload_documents');
    Route::get('/documents/{id}/download', [HRController::class, 'download_document'])->name('hr.download_document');
});
