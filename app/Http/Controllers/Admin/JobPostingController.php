<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::all(); // Fetch all job postings
        return view('admin.job_postings.index', compact('jobPostings'));
    }

    // Create Job Posting
    public function create()
    {
        return view('admin.job_postings.create');
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
        return redirect()->route('admin.job_postings')->with('success', 'Job posting created successfully');
    }

    // Edit job posting 
    public function edit($id)
    {
        $jobPosting = JobPosting::findOrFail($id); // Find job posting by ID
        return view('admin.job_postings.edit', compact('jobPosting')); // Show edit form
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'position_needed' => 'required|integer',
            'job_grade' => 'nullable|string|max:10',
            'advert_no' => 'nullable|string|max:10',
            'application_deadline' => 'required|date', 
            'description' => 'nullable|string|max:2000',

        ]);

        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->update($request->all()); // Update job posting
        // dd($request->all());

        return redirect()->route('admin.job_postings')->with('success', 'Job posting updated successfully.');
    }

    public function destroy($id)
    {
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->delete(); // Delete job posting
        return redirect()->route('admin.job_postings')->with('success', 'Job posting deleted successfully.');
    }
}
