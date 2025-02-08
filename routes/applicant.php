<?php
// routes/applicant.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Applicant\ProfileController;
use App\Http\Controllers\Applicant\EducationController;
use App\Http\Controllers\Applicant\OtherTrainingsController;
use App\Http\Controllers\Applicant\EmploymentHistoryController;
use App\Http\Controllers\Applicant\RefereesController;
use App\Http\Controllers\Applicant\FileUploadController;
use App\Http\Controllers\Applicant\JobApplicationController;


// Applicant routes
Route::prefix('applicant')->middleware(['auth', 'role:applicant'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

    // PERSONAL PROFILE
    Route::get('/personal-profile', [ProfileController::class, 'index'])->name('applicant.profile');
    Route::put('/personal-profile', [ProfileController::class, 'update'])->name('applicant.profile.update');
   
    
    // EDUCATION
    Route::get('/education-profile', [EducationController::class, 'index'])->name('applicant.education_profile');
    Route::get('/education-profile/create', [EducationController::class, 'create'])->name('applicant.education_create');
    Route::post('/education-profile', [EducationController::class, 'store'])->name('applicant.education_store');
    Route::get('/education-profile/{id}/edit', [EducationController::class, 'edit'])->name('applicant.education_edit');
    Route::put('/education-profile/{id}', [EducationController::class, 'update'])->name('applicant.education_update');
    Route::delete('/education-profile/{id}', [EducationController::class, 'destroy'])->name('applicant.education_destroy');


    // OTHER TRAININGS
    Route::get('/other-trainings', [OtherTrainingsController::class, 'index'])->name('applicant.other_trainings'); 
    Route::get('/other-trainings/create', [OtherTrainingsController::class, 'create'])->name('applicant.other_trainings_create'); 
    Route::post('/other-trainings', [OtherTrainingsController::class, 'store'])->name('applicant.other_trainings_store'); 
    Route::get('/other-trainings/{id}/edit', [OtherTrainingsController::class, 'edit'])->name('applicant.other_trainings_edit'); 
    Route::put('/other-trainings/{id}', [OtherTrainingsController::class, 'update'])->name('applicant.other_trainings_update');
    Route::delete('/other-trainings/{id}', [OtherTrainingsController::class, 'destroy'])->name('applicant.other_trainings_delete'); 



    // EMPLOYMENT HISTORY
    Route::get('/employment-history', [EmploymentHistoryController::class, 'index'])->name('applicant.employment_profile');
    Route::get('/employment-history/create', [EmploymentHistoryController::class, 'create'])->name('applicant.employment_create');
    Route::post('/employment-history', [EmploymentHistoryController::class, 'store'])->name('applicant.employment_store');
    Route::get('/employment-history/{id}/edit', [EmploymentHistoryController::class, 'edit'])->name('applicant.employment_edit');
    Route::put('/employment-history/{id}', [EmploymentHistoryController::class, 'update'])->name('applicant.employment_update');
    Route::delete('/employment-history/{id}', [EmploymentHistoryController::class, 'destroy'])->name('applicant.employment_delete');


    
    // REFEREES
    Route::get('/referees', [RefereesController::class, 'index'])->name('applicant.referees');
    Route::get('/referees/create', [RefereesController::class, 'create'])->name('applicant.referees.create');
    Route::post('/referees', [RefereesController::class, 'store'])->name('applicant.referees.store');
    Route::get('/referees/{id}/edit', [RefereesController::class, 'edit'])->name('applicant.referees.edit');
    Route::put('/referees/{id}', [RefereesController::class, 'update'])->name('applicant.referees.update');
    Route::delete('/referees/{id}', [RefereesController::class, 'destroy'])->name('applicant.referees.delete');


    // FILE UPLOADS
    Route::get('/file-upload', [FileUploadController::class, 'index'])->name('applicant.files_upload');
    Route::post('/file-upload', [FileUploadController::class, 'store'])->name('applicant.document_store');
    Route::delete('/file-upload/{id}', [FileUploadController::class, 'destroy'])->name('applicant.document_destroy');


    // JOB APPLICATION HISTORY
    Route::get('/job-application-history', [JobApplicationController::class, 'applicationHistory'])->name('applicant.application_history');

    // ADVERTISED JOBS
    Route::get('/jobs-advertised', [JobApplicationController::class, 'vacancies'])->name('applicant.job_posting');
    Route::get('/jobs-advertised/{id}', [JobApplicationController::class, 'singleJob'])->name('applicant.single_job_posting');

    // APPLY FOR A JOB
    Route::post('/jobs-advertised/{id}/apply', [JobApplicationController::class, 'apply'])->name('applicant.apply_job');
});
