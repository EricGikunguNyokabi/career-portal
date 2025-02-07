<?php
// php artisan make:controller HRController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\JobPosting;
use App\Models\Application;

class HRController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        // Logic to gather data for the HR dashboard
        return view('hr.dashboard');
    }

    // APPLICANT MANAGEMENT
    public function applicant_list()
    {
        // $applicants = Applicant::all();
        return view('hr.applicant_list', compact('applicants'));
    }

    public function view_applicant($id)
    {
        // $applicant = Applicant::findOrFail($id);
        return view('hr.view_applicant', compact('applicant'));
    }

    public function update_applicant(Request $request, $id)
    {
        // $applicant = Applicant::findOrFail($id);
        // $applicant->update($request->all());
        return redirect()->route('hr.applicant_list')->with('success', 'Applicant updated successfully.');
    }

    public function delete_applicant($id)
    {
        // $applicant = Applicant::findOrFail($id);
        // $applicant->delete();
        return redirect()->route('hr.applicant_list')->with('success', 'Applicant deleted successfully.');
    }

    // JOB POSTINGS
    public function job_postings()
    {
        // $jobPostings = JobPosting::all();
        return view('hr.job_postings', compact('jobPostings'));
    }

    public function create_job_posting()
    {
        return view('hr.create_job_posting');
    }

    public function store_job_posting(Request $request)
    {
        // JobPosting::create($request->all());
        return redirect()->route('hr.job_postings')->with('success', 'Job posting created successfully.');
    }

    public function edit_job_posting($id)
    {
        // $jobPosting = JobPosting::findOrFail($id);
        return view('hr.edit_job_posting', compact('jobPosting'));
    }

    public function update_job_posting(Request $request, $id)
    {
        // $jobPosting = JobPosting::findOrFail($id);
        // $jobPosting->update($request->all());
        return redirect()->route('hr.job_postings')->with('success', 'Job posting updated successfully.');
    }

    public function delete_job_posting($id)
    {
        // $jobPosting = JobPosting::findOrFail($id);
        // $jobPosting->delete();
        return redirect()->route('hr.job_postings')->with('success', 'Job posting deleted successfully.');
    }

    // APPLICATION MANAGEMENT
    public function view_applications()
    {
        // $applications = Application::all();
        return view('hr.view_applications', compact('applications'));
    }

    public function view_application($id)
    {
        // $application = Application::findOrFail($id);
        return view('hr.view_application', compact('application'));
    }

    public function update_application_status(Request $request, $id)
    {
        // $application = Application::findOrFail($id);
        // $application->update(['status' => $request->input('status')]);
        return redirect()->route('hr.view_applications')->with('success', 'Application status updated successfully.');
    }

    public function delete_application($id)
    {
        // $application = Application::findOrFail($id);
        // $application->delete();
        return redirect()->route('hr.view_applications')->with('success', 'Application deleted successfully.');
    }

    // REPORTS & ANALYTICS
    public function reports()
    {
        // Logic to generate and view reports
        return view('hr.reports');
    }

    public function analytics()
    {
        // Logic to generate and view analytics
        return view('hr.analytics');
    }

    // NOTIFICATIONS
    public function notifications()
    {
        // Logic to view notifications
        return view('hr.notifications');
    }
}