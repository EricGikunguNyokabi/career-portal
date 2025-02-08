<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PreviousEmployment;
use Illuminate\Support\Facades\Auth;

class EmploymentHistoryController extends Controller
{
    //
    public function index()
    {
        $employmentHistory = PreviousEmployment::where('user_id', Auth::id())->orderBy('start_date', 'desc')->get();
        return view('applicant.employment_history.index', compact('employmentHistory'));
    }

    public function create()
    {
        return view('applicant.applicant_profile.create_employment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'responsibilities' => 'required|string',
        ]);

        PreviousEmployment::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'responsibilities' => $request->responsibilities,
        ]);

        return redirect()->route('applicant.employment_profile')->with('success', 'Employment history added successfully.');
    }

    public function edit($id)
    {
        $employmentHistory = PreviousEmployment::findOrFail($id);

        return view('applicant.employment_history.edit', compact('employmentHistory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'responsibilities' => 'required|string',
        ]);

        $employmentHistory = PreviousEmployment::findOrFail($id);

        $employmentHistory->update($request->all());

        return redirect()->route('applicant.employment_profile')->with('success', 'Employment history updated successfully.');
    }

    public function destroy($id)
    {
        // Find the employment history record by ID
        $employmentHistory = PreviousEmployment::findOrFail($id);

        // Delete the record
        $employmentHistory->delete();

        // Redirect back with a success message
        return redirect()->route('applicant.employment_profile')->with('success', 'Employment history deleted successfully.');
    }
}
