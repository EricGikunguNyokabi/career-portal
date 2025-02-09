<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        // Eager load applicant and job details for efficiency
        $applicant = JobApplication::with(['applicant', 'job'])->get();
        
        return view("hr.applicants.index", compact("applicant"));
    }

    public function show($id)
    {
        // Show applicant details
        $application = JobApplication::with([
            'applicant', 
            'job',
            'education',
            'other_trainings',
            'work_experiences',
            'referees',
            'documents',
            ])->findOrFail($id);
        
        return view("hr.applicants.show", compact('application'));
    }

    public function destroy($id)
    {
        // Delete the applicant application
        $application = JobApplication::findOrFail($id);
        $application->delete();
        
        return redirect()->route('hr.applicants.index')->with('success', 'Application Deleted Successfully');
    }
}
