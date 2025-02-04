<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\EmploymentHistory;
use Illuminate\Http\Request;

class EmploymentHistoryController extends Controller
{
    //
    public function index(){
        // $otherTrainings = OtherTrainings::orderBy("created_at","desc")->paginate(10);
        $employmentHostory = EmploymentHistory::all();
        return view("applicant.profile.employment_history.index", compact("employmentHostory"));
    }
}
