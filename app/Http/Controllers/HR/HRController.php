<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HRController extends Controller
{
    //

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

        // Notifications
        auth()->user()->unreadNotifications->markAsRead();


        // Pass data to the view
        return view('hr.dashboard', compact('applications', 'jobPostings', 'jobCategories', 'positionsRequired'));
    }


    



}
