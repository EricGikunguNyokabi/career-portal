<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NewJobApplication;



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
        return view('applicant.jobs.jobs_advertised', compact('jobs')); 
    }

    // Display a single job posting
    public function singleJob($id)
    {
        $job = JobPosting::findOrFail($id); // Fetch the job by ID
        return view('applicant.jobs.single_job', compact('job')); 
    }

    // Apply for a job
    public function apply(Request $request, $id)
    {
        $request->validate([
            'education_id' => 'nullable|exists:educations,id',
            'other_training_id' => 'nullable|exists:other_trainings,id',
            'experience_id' => 'nullable|exists:previous_employments,id',
            'referee_id' => 'nullable|exists:referees,id',
            'document_id' => 'nullable|exists:documents,id',
        ]);

        $jobApplication = JobApplication::create([
            'applicant_id' => auth()->id(),
            'job_id' => $id,
            'education_id' => $request->education_id,
            'other_training_id' => $request->other_training_id,
            'experience_id' => $request->experience_id,
            'referee_id' => $request->referee_id,
            'document_id' => $request->document_id,
            'status' => 'pending', // Default status
        ]);

        // Notify all HR users
        $hrUsers = User::where('role', 'hr_team')->get();
        $applicant = auth()->user(); // Get the logged-in user (applicant)


        foreach ($hrUsers as $hr) {
            $hr->notify(new NewJobApplication($jobApplication, $applicant)); // Pass both parameters
        }

        return redirect()->route('applicant.application_history')->with('status', 'Application submitted successfully!');
    }
}
