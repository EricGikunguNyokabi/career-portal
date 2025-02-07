<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Referee; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefereesController extends Controller
{
    // Display a listing of the referees
    public function index()
    {
        $referees = Referee::where('user_id', Auth::id())->get(); // Fetch referees associated with the authenticated user
        return view('applicant.referees.index', compact('referees')); // Pass the referees to the view
    }

    // Show the form for creating a new referee
    public function create()
    {
        return view('applicant.referees.create'); // Return the view for creating a new referee
    }

    // Store a newly created referee in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'relationship' => 'required|string|max:255',
        ]);

        // Create a new referee record
        Referee::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return redirect()->route('applicant.referees')->with('success', 'Referee added successfully.');
    }

    // Show the form for editing the specified referee
    public function edit($id)
    {
        $referee = Referee::findOrFail($id); // Find the referee or fail
        return view('applicant.referees.edit', compact('referee')); // Return the edit view
    }

    // Update the specified referee in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'relationship' => 'required|string|max:255',
        ]);

        $referee = Referee::findOrFail($id); // Find the referee or fail
        $referee->update($request->all()); // Update the referee record

        return redirect()->route('applicant.referees')->with('success', 'Referee updated successfully.');
    }

    // Remove the specified referee from storage
    public function destroy($id)
    {
        $referee = Referee::findOrFail($id); // Find the referee or fail
        $referee->delete(); // Delete the referee record

        return redirect()->route('applicant.referees')->with('success', 'Referee deleted successfully.');
    }
}