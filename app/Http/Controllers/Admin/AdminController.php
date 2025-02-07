<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $jobPosting = JobPosting::all();
        $jobPostingCount = JobPosting::count();
        return view("admin.dashboard", compact("jobPostingCount"));
    }
}
