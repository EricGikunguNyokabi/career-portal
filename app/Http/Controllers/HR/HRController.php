<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class HRController extends Controller
{
    //
    public function dashboard()
    {
        $applications = JobApplication::count();

        $jobPostings = JobPosting::count();
        return view('hr.dashboard', compact('applications','jobPostings'));
    }
}
