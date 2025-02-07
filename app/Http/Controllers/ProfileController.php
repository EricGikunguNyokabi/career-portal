<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure the User model is imported

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        // Validate input data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'alternative_number' => 'nullable|string|max:15',
            'emergency_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for profile picture
        ]);

        $user = auth()->user();

         // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time().'_'.$user->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile_pictures');
            $image->move($destinationPath, $imageName);

            // Save the image path to the database
            $user->profile_picture = '/images/profile_pictures/'.$imageName;
        }

        $user = Auth::user(); // This should be an instance of the User model
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->alternative_number = $request->input('alternative_number');
        $user->emergency_number = $request->input('emergency_number');
        $user->address = $request->input('address');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender = $request->input('gender');
        // dd($request->all());

        $user->save(); // The save() method should work fine here

        return redirect()->route('applicant.personal_profile')->with('success', 'Profile updated successfully!');
    }
}
