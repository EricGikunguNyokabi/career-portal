<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function dashboard()
    {
        // Count total job applications
        $applications = JobApplication::count();

        // Count total job postings
        // $jobPostings = JobPosting::sum('position_needed');
        $jobPostings = JobPosting::count();

        $positionsRequired = JobPosting::sum('position_needed');

        // Get job categories with total positions needed
        $jobCategories = JobPosting::select('title', DB::raw('SUM(position_needed) as total_positions'))
            ->groupBy('title')
            ->get();

        // Pass data to the view
        return view('management.dashboard', compact('applications', 'jobPostings', 'jobCategories', 'positionsRequired'));
    }

    public function jobs()
    {
        $jobPostings = JobPosting::all(); // Fetch all job postings
        return view('management.job_postings.index', compact('jobPostings'));
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

    public function view($file_name)
    {
        $filePath = 'documents/' . $file_name; // Ensure your files are stored in 'storage/app/public/documents/'
        
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'Document not found.');
        }

        return response()->file(storage_path('app/public/' . $filePath), [
            'Content-Disposition' => 'inline', // Ensures the file is displayed in the browser
        ]);
    }
}

 