<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    // Display the applicant dashboard
    public function dashboard()
    {
        // Count the number of job postings
        $jobPostingCount = JobPosting::count();

        return view("applicant.dashboard", compact('jobPostingCount'));
    }

    public function personalProfile()
    {
        $user = Auth::user();

        // List of fields that are required for profile completion
        $requiredFields = [
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'phone_number',
            'address',
            'date_of_birth',
            'gender',
            'profile_picture',
        ];

        $filledFields = 0;

        // Count how many fields are filled
        foreach ($requiredFields as $field) {
            if (!empty($user->$field)) {
                $filledFields++;
            }
        }

        // Calculate completion percentage
        $profileCompletion = ($filledFields / count($requiredFields)) * 100;

        return view('applicant.personal_profile', compact('user', 'profileCompletion'));
    }

    // Display the applicant profile
    public function profile()
    {
        // Get the currently authenticated user
        $user = User::user();
       
        return view('applicant.personal_details', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::user(); // Get the authenticated user

        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'alternative_number' => 'nullable|string|max:15',
            'emergency_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                // Assuming the old profile picture is stored in the public directory
                $oldImagePath = public_path($user->profile_picture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Store new profile picture
            $image = $request->file('profile_picture');
            $imageName = time().'_'.$user->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile_pictures');
            $image->move($destinationPath, $imageName);

            // Save the image path to the database
            $user->profile_picture = '/images/profile_pictures/'.$imageName;
        }


        // Save the updated user details
        // dd($user);
        $user->save(); #ignore:save 

        // Redirect back with a success message
        return redirect()->route('applicant.personal_profile')->with('success', 'Profile updated successfully.');
    }
}
