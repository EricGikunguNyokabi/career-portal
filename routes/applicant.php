<?php
// routes/applicant.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Applicant\EducationController;
use App\Http\Controllers\Applicant\OtherTrainingsController;
use App\Http\Controllers\Applicant\EmploymentHistoryController;
use App\Http\Controllers\Applicant\RefereesController;
use App\Models\Education;


// Applicant routes
Route::prefix('applicant')->middleware(['auth', 'role:applicant'])->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('applicant.dashboard');

    // PERSONAL PROFILE
    Route::get('/personal-profile', [ApplicantController::class, 'personalProfile'])->name('applicant.personal_profile');
    Route::put('/personal-profile', [ProfileController::class, 'updateProfile'])->name('applicant.updateProfile');
   
    
    // EDUCATION
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
    Route::get('/file-upload', [ApplicantController::class, 'uploadFiles'])->name('applicant.files_upload');
    Route::post('/file-upload', [ApplicantController::class, 'storeFiles'])->name('files.upload');
    Route::get('/file-download/{id}', [ApplicantController::class, 'downloadFile'])->name('files.download');
    Route::delete('/file-delete/{id}', [ApplicantController::class, 'deleteFile'])->name('files.delete');

    // JOBS
    // APPLICANT HISTORY
    Route::get('/job-application-history', [ApplicantController::class, 'applicationHistory'])->name('applicant.application_history');

    // ADVERTISED JOBS
    Route::get('/jobs-advertised', [ApplicantController::class, 'vacancies'])->name('applicant.advertised_jobs');
    Route::get('/jobs-advertised/{id}', [ApplicantController::class, 'singleJob'])->name('applicant.single_job');
});
