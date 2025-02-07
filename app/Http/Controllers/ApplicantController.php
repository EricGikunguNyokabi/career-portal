<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth; // Correct import for Auth

class ApplicantController extends Controller
{
    /**
     * Show the applicant dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('applicant.dashboard', compact('user'));
    }

    /**
     * Show the personal profile view.
     *
     * @return \Illuminate\View\View
     */
    public function personalProfile()
    {
        $user = Auth::user();

        // List of fields that are required for profile completion
        $requiredFields = [
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'phone_number',
            'address',
            'date_of_birth',
            'gender',
            'profile_picture',
        ];

        $filledFields = 0;

        // Count how many fields are filled
        foreach ($requiredFields as $field) {
            if (!empty($user->$field)) {
                $filledFields++;
            }
        }

        // Calculate completion percentage
        $profileCompletion = ($filledFields / count($requiredFields)) * 100;

        return view('applicant.applicant_profile.personal_profile', compact('user', 'profileCompletion'));
    }



























    public function professionalMembership()
    {
        return view('applicant.applicant_profile.professional_membership');
    }

    /**
     * Show the employment history view.
     *
     * @return \Illuminate\View\View
     */
    public function employmentHistory()
    {
        return view('applicant.applicant_profile.employment_history');
    }

    /**
     * Show the referees view.
     *
     * @return \Illuminate\View\View
     */
    public function referees()
    {
        return view('applicant.applicant_profile.referees');
    }

    /**
     * Show the file upload view.
     *
     * @return \Illuminate\View\View
     */
    public function uploadFiles()
    {
        return view('applicant.applicant_profile.upload_files');
    }

    /**
     * Show the application history view.
     *
     * @return \Illuminate\View\View
     */
    public function applicationHistory()
    {
        return view('applicant.jobs.application_history');
    }

    /**
     * Show the vacancies view.
     *
     * @return \Illuminate\View\View
     */
    public function vacancies()
    {
        return view('applicant.jobs.advertised_jobs');
    }

    /**
     * Show a single job detail view.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function singleJob($id)
    {
        // Fetch job details if needed
        // $job = Job::findOrFail($id);
        return view('applicant.jobs.single_job', ['job_id' => $id]); // Pass job ID to view
    }
}
