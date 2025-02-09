<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::all(); // Fetch all job postings
        return view('hr.job_postings.index', compact('jobPostings'));
    }

    // Create Job Posting
    public function create()
    {
        return view('hr.job_postings.create');
    }

    // Store Job Posting
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'position_needed' => 'required|integer',
            'job_grade' => 'nullable|string|max:20',
            'advert_no' => 'nullable|string|max:20',
            'description'=> 'nullable|string|max:1000',
            'application_deadline' => 'required|date', 
        ]);

        JobPosting::create($request->all()); // Create a new job posting
        return redirect()->route('hr.job_postings.index')->with('success', 'Job posting created successfully');
    }

    // Edit job posting 
    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id); // Find job posting by ID
        return view('hr.job_postings.edit', compact('jobPosting')); // Show edit form
    }

    public function update(Request $request, $id)
    {
        // Debugging: Check incoming request data
        // dd($request->all());
    
        $request->validate([
            'title' => 'required|string|max:255',
            'position_needed' => 'required|integer',
            'job_grade' => 'nullable|string|max:15',
            'advert_no' => 'nullable|string|max:15',
            'application_deadline' => 'required|date', 
            'description' => 'nullable|string|max:2000',
        ]);
    
        $jobPosting = JobPosting::findOrFail($id);
    
        // Debugging: Check the job posting before update
        // dd($jobPosting);
    
        try {
            $jobPosting->update($request->all());
        } catch (\Exception $e) 
        {
            // Log the error message
            \Log::error('Update failed: ' . $e->getMessage());
            return redirect()->route('hr.job_postings.index')->with('error', 'Job posting update failed: ' . $e->getMessage());
        }

    
        return redirect()->route('hr.job_postings.index')->with('success', 'Job posting updated successfully.');
    }

    // public function destroy($id)
    // {
    //     $jobPosting = JobPosting::findOrFail($id);
    //     $jobPosting->delete(); // Delete job posting
    //     return redirect()->route('hr.job_postings.index')->with('success', 'Job posting deleted successfully.');
    // }
}
