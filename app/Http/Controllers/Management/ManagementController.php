<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function dashboard()
    {
        $applications = JobApplication::count();

        $jobPostings = JobPosting::count();
        return view('management.dashboard', compact('applications','jobPostings'));
    }

    public function jobs()
    {
        $jobPostings = JobPosting::all(); // Fetch all job postings
        return view('management.job_postings', compact('jobPostings'));
    }

    public function applicant()
    {
        // Eager load applicant and job details for efficiency
        $applicant = JobApplication::with(['applicant', 'job'])->get();
        
        return view("management.applicants.index", compact("applicant"));
    }

    public function showApplicant($id)
    {
        // Show applicant details
        $application = JobApplication::with(['applicant', 'job'])->findOrFail($id);
        
        return view("management.applicants.show", compact('application'));
    }
}

 