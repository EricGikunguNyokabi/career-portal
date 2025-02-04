<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\OtherTrainings;
use Illuminate\Http\Request;

class OtherTrainingsController extends Controller
{
    //
    public function index(){
        // $otherTrainings = OtherTrainings::orderBy("created_at","desc")->paginate(10);
        $otherTrainings = OtherTrainings::all();
        return view("applicant.profile.other_trainings.index", compact("otherTrainings"));
    }
}
