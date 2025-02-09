<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HR\HRController;
use App\Http\Controllers\HR\ApplicantController;
use App\Http\Controllers\HR\JobPostingController;

// HR routes
Route::prefix('hr')->middleware(['auth', 'role:hr_team'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [HRController::class, 'dashboard'])->name('hr.dashboard');

    // APPLICANT MANAGEMENT
    Route::get('/applicant-list', [ApplicantController::class, 'index'])->name('hr.applicants.index');
    Route::get('/applicants/{id}', [ApplicantController::class, 'show'])->name('hr.applicants.view'); 
    Route::get('/applicant/uploaded-document/{id}', [ApplicantController::class, 'view'])->name('hr.applicants.document.view');
    


    // Route::get('/applicant/filter', [ApplicantController::class, 'filter'])->name('hr.filter_applicants');
    
    // JOB POSTINGS
    Route::get('/job-postings', [JobPostingController::class, 'index'])->name('hr.job_postings.index');
    Route::get('/job-postings/create', [JobPostingController::class, 'create'])->name('hr.job_posting.create');
    Route::post('/job-postings/store', [JobPostingController::class, 'store'])->name('hr.job_posting.store');
    Route::get('/job-postings/{id}/edit', [JobPostingController::class, 'edit'])->name('hr.job_posting.edit');
    Route::put('/job-postings/{id}/update', [JobPostingController::class, 'update'])->name('hr.job_posting.update');
    Route::delete('/job-postings/{id}/delete', [JobPostingController::class, 'destroy'])->name('hr.job_posting.delete');


});
