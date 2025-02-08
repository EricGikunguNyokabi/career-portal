<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\JobPosting;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $jobPostings = JobPosting::all();
    return view('portal_index', compact('jobPostings'));
})->name('home');

Route::get('/job-posting/{id}/', function($id){
    $singleJobPosting = JobPosting::find($id);
    // if (!$singleJobPosting) {
    //     abort(404); // Not found
    // }
    return view('single_job', compact('singleJobPosting'));
})->name('view.single.job');

// Route::get('/register', function () {
//     return view('auth/register');
// })->name('register');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



// Route::get('/login', function () {
//     return view('auth/login');
// })->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Route::get('/vacancies', function () {
//     return view('job_vacancies',['jobs' => Job::all()]);
// });


// Route::get('/vacancies/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('job_vacancy',['job' => $job]);
// });


// Include applicant routes
require base_path('routes/applicant.php');
require base_path('routes/hr.php');
require base_path('routes/admin.php');
require base_path('routes/management.php');