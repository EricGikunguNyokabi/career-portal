<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())->get();
        return view('applicant.education.index', compact('educations'));
    }

    public function create()
    {
        return view('applicant.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'academic_level' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        Education::create([
            'user_id' => Auth::id(),
            'institution_name' => $request->institution_name,
            'academic_level' => $request->academic_level,
            'course' => $request->course,
            'grade' => $request->grade,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('applicant.education_profile')->with('success', 'Education record added successfully.');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('applicant.education.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'academic_level' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
    
        $education = Education::findOrFail($id);
            
    
        $education->update([
            'institution_name' => $request->institution_name,
            'academic_level' => $request->academic_level,
            'course' => $request->course,
            'grade' => $request->grade,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('applicant.education_profile')->with('success', 'Education record updated successfully.');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('applicant.education_profile')->with('success', 'Education record deleted successfully.');
    }
}

