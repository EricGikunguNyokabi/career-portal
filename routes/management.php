<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\ManagementController;

// HR routes
Route::prefix('mgt')->middleware(['auth', 'role:management'])->group(function () {
       // DASHBOARD
    Route::get('/dashboard', [ManagementController::class, 'dashboard'])->name('mgt.dashboard');

    // APPLICANT 
    Route::get('/applicant-list', [ManagementController::class, 'applicant'])->name('mgt.applicant.index');
    Route::get('/applicant/{id}', [ManagementController::class, 'showApplicant'])->name('mgt.showApplicant');
    Route::get('/applicant/uploaded-document/{id}', [ManagementController::class, 'view'])->name('mgt.applicants.document.view');

   
    
    // JOB POSTINGS
    Route::get('/job-postings', [ManagementController::class, 'jobs'])->name('mgt.job_postings');
    



});
