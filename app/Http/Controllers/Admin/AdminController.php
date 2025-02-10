<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $jobPostingCount = JobPosting::count();
        
        $users = User::count();
    
        $admin = User::where('role', 'admin')->count();
        $hr = User::where('role', 'hr_team')->count();
        $management = User::where('role', 'management')->count();
        $applicant = User::where('role', 'applicant')->count();
    
        return view("admin.dashboard", compact("jobPostingCount", "users", "admin", "hr", "management", "applicant"));
    }
    
}
