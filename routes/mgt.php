<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MGTController;

// HR routes
Route::prefix('mgt')->middleware(['auth', 'role:management'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [MGTController::class, 'dashboard'])->name('mgt.dashboard');

    // APPLICANT MANAGEMENT
    Route::get('/applicant-list', [MGTController::class, 'applicant_list'])->name('mgt.applicant_list');
    Route::get('/applicant/{id}', [MGTController::class, 'view_applicant'])->name('mgt.view_applicant');
    Route::get('/applicant/filter', [MGTController::class, 'filter_applicants'])->name('mgt.filter_applicants');
    
    // JOB POSTINGS
    Route::get('/job-postings', [MGTController::class, 'job_postings'])->name('mgt.job_postings');
    Route::get('/job-postings/filter', [MGTController::class, 'filter_job_postings'])->name('mgt.filter_job_postings');

    // APPLICATION MANAGEMENT
    Route::get('/applications', [MGTController::class, 'view_applications'])->name('mgt.view_applications');
    Route::get('/application/{id}', [MGTController::class, 'view_application'])->name('mgt.view_application');
    
    // REPORTS & ANALYTICS
    Route::get('/reports', [MGTController::class, 'reports'])->name('mgt.reports');
    Route::get('/analytics', [MGTController::class, 'analytics'])->name('mgt.analytics');

    // NOTIFICATIONS
    Route::get('/notifications', [MGTController::class, 'notifications'])->name('mgt.notifications');

    // INTERVIEW SCHEDULING
    Route::get('/interviews', [MGTController::class, 'interviews'])->name('mgt.interviews');
    Route::post('/interviews/schedule', [MGTController::class, 'schedule_interview'])->name('mgt.schedule_interview');
    Route::post('/interviews/reschedule', [MGTController::class, 'reschedule_interview'])->name('mgt.reschedule_interview');

    // DOCUMENT MANAGEMENT
    Route::get('/documents', [MGTController::class, 'documents'])->name('mgt.documents');
    Route::post('/documents/upload', [MGTController::class, 'upload_documents'])->name('mgt.upload_documents');
    Route::get('/documents/{id}/download', [MGTController::class, 'download_document'])->name('mgt.download_document');
});
