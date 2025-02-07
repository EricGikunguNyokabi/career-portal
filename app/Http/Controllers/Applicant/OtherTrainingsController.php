<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\OtherTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherTrainingsController extends Controller
{

    // Display a listing of the other trainings
    public function index()
    {
        $otherTrainings = OtherTraining::all(); // Fetch all other training records
        return view('applicant.other_training.index', compact('otherTrainings')); // Pass the records to the view
    }

    // Show the form for creating a new training record
    public function create()
    {
        return view('applicant.other_training.create'); // Return the view for creating a new record
    }

    // Store a newly created training record in storage
    public function store(Request $request)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        OtherTraining::create($request->all()); // Create a new record using mass assignment

        return redirect()->route('applicant.other_trainings')->with('success', 'Other training added successfully.');
    }

    // Show the form for editing the specified training record
    public function edit($id)
    {
        $otherTraining = OtherTraining::findOrFail($id); // Find the record or fail
        return view('applicant.other_trainings.edit', compact('otherTraining')); // Return the edit view
    }

    // Update the specified training record in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $otherTraining = OtherTraining::findOrFail($id); // Find the record or fail
        $otherTraining->update($request->all()); // Update the record

        return redirect()->route('applicant.other_training.edit')->with('success', 'Other training updated successfully.');
    }

    // Remove the specified training record from storage
    public function destroy($id)
    {
        $otherTraining = OtherTraining::findOrFail($id); // Find the record or fail
        $otherTraining->delete(); // Delete the record

        return redirect()->route('applicant.other_trainings')->with('success', 'Other training deleted successfully.');
    }
 
}
