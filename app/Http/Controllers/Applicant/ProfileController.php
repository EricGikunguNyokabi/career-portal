<?php

namespace App\Http\Controllers\Applicant;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Fetch the authenticated user's data
        $user = Auth::user();

        // Return a view with the user's data
        return view('applicant.profile.index', compact('user'));
    }
    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone_number' => 'required|string|max:15',
            'alternative_number' => 'nullable|string|max:15',
            'emergency_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Male,Female',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update user details
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->alternative_number = $request->alternative_number;
        $user->emergency_number = $request->emergency_number;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            // Get the uploaded file
            $image = $request->file('profile_picture');
            // Create a unique filename
            $imageName = time() . '_' . $user->id . '.' . $image->getClientOriginalExtension();
            // Store the new profile picture in the public disk
            $path = $image->storeAs('profile_pictures', $imageName, 'public');
            // Save the image path to the database
            $user->profile_picture = $path; // This will be 'profile_pictures/unique_filename.jpg'
        }

        // Save the updated user information
        $user->save();

        // Redirect back with a success message
        return redirect()->route('applicant.profile')->with('success', 'Profile updated successfully.');
    }

    // Get the authenticated user
    // $user = Auth::user();
    
}
