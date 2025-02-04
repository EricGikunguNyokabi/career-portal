<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function index(){
        $educations = Education::all();
        return view("applicant.profile.education.index",compact("educations"));
    }
}
