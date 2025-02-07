<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    // Display job application history
    public function applicationHistory()
    {
        $applications = JobApplication::where('applicant_id', auth()->id())->get(); // Fetch applications for the logged-in applicant
        return view('applicant.jobs.application_history', compact('applications')); // Replace with your actual view name
    }

    // Display all advertised jobs
    public function vacancies()
    {
        $jobs = JobPosting::all(); // Fetch all advertised jobs
        return view('applicant.jobs.jobs_advertised', compact('jobs')); // Replace with your actual view name
    }

    // Display a single job posting
    public function singleJob($id)
    {
        $job = JobPosting::findOrFail($id); // Fetch the job by ID
        return view('applicant.jobs.single_job', compact('job')); // Replace with your actual view name
    }

    // Apply for a job
    public function apply(Request $request, $id)
    {
        $request->validate([
            // Add validation rules as necessary
        ]);

        // Create a new job application
        JobApplication::create([
            'applicant_id' => auth()->id(),
            'job_id' => $id,
            // Add other fields as necessary
        ]);

        return redirect()->route('applicant.application_history')->with('status', 'Application submitted successfully!');
    }
}
