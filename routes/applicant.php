<?php
// routes/applicant.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Applicant\ProfileController;
use App\Http\Controllers\Applicant\EducationController;
use App\Models\Education;


// Applicant routes
Route::middleware(['auth','role:applicant'])->prefix('applicant')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

    // PERSONAL PROFILE
    Route::get('/personal-profile', [ApplicantController::class, 'profile'])->name('applicant.profile');
    Route::put('/personal-profile', [ApplicantController::class, 'updateProfile'])->name('applicant.updateProfile');

   
    
    // Route for viewing all education records
    Route::get('/education-profile', [EducationController::class, 'index'])->name('applicant.education_profile');
    // Route for displaying the form to create a new education record
    Route::get('/education-profile/create', [EducationController::class, 'create'])->name('applicant.education_create');
    // Route for storing a new education record
    Route::post('/education-profile', [EducationController::class, 'store'])->name('applicant.education_store');
    // Route for displaying the form to edit an existing education record
    Route::get('/education-profile/{education}/edit', [EducationController::class, 'edit'])->name('applicant.education_edit');
    // Route for updating an existing education record
    Route::put('/education-profile/{education}', [EducationController::class, 'update'])->name('applicant.education_update');
    Route::delete('/education-profile/{education}', [EducationController::class, 'destroy'])->name('applicant.education_destroy');
    

    // OTHER TRAININGS
    Route::get('/other-trainings', [ApplicantController::class, 'otherTrainings'])->name('applicant.training_profile');

    // PROFESSIONAL MEMBERSHIP
    Route::get('/professional-membership', [ApplicantController::class, 'professionalMembership'])->name('applicant.membership_profile');

    // EMPLOYMENT HISTORY
    Route::get('/employment-history', [ApplicantController::class, 'employmentProfile'])->name('applicant.employment_profile');
    Route::get('/employment-history/create', [ApplicantController::class, 'createEmployment'])->name('applicant.employment_create');
    Route::post('/employment-history', [ApplicantController::class, 'storeEmployment'])->name('applicant.employment_store');
    Route::get('/employment-history/{id}/edit', [ApplicantController::class, 'editEmployment'])->name('applicant.employment_edit');
    Route::put('/employment-history/{id}', [ApplicantController::class, 'updateEmployment'])->name('applicant.employment_update');
    Route::delete('/employment-history/{id}', [ApplicantController::class, 'deleteEmployment'])->name('applicant.employment_delete');

    // REFEREES
    Route::get('/referees', [ApplicantController::class, 'referees'])->name('applicant.referees');

    // FILE UPLOADS
    Route::get('/file-upload', [ApplicantController::class, 'uploadFiles'])->name('applicant.files_upload');
    Route::post('/file-upload', [ApplicantController::class, 'storeFiles'])->name('files.upload');
    Route::get('/file-download/{id}', [ApplicantController::class, 'downloadFile'])->name('files.download');
    Route::delete('/file-delete/{id}', [ApplicantController::class, 'deleteFile'])->name('files.delete');

    // JOBS
    // APPLICANT HISTORY
    Route::get('/job-application-history', [ApplicantController::class, 'applicationHistory'])->name('applicant.application_history');

    // ADVERTISED JOBS
    Route::get('/jobs-advertised', [ApplicantController::class, 'vacancies'])->name('applicant.jobs');
    Route::get('/jobs-advertised', [ApplicantController::class, 'vacancies'])->name('applicant.advertised_jobs');
    Route::get('/jobs-advertised/{id}', [ApplicantController::class, 'singleJob'])->name('applicant.single_job');
});
