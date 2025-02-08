<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:applicant,hr_team,management,admin', // Ensure valid roles
        ]);

        User::create([
            'first_name' => $validatedData['first_name'], // Correct field name
            'last_name' => $validatedData['last_name'],   // Correct field name
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Use Hash facade
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('admin.user_list')->with('success', 'User  created successfully!');
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)

    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:applicant,hr_team,management,admin', 
        ]);

        $user = User::findOrFail($id);
        $user -> update([
            'first_name'=> $request['first_name'],
            'middle_name'=> $request['middle_name'],
            'last_name'=> $request['last_name'],
            'email'=> $request['email'],
            'role'=> $request['role'],
        ]);
        return redirect()->route('admin.user_list')->with('success', 'User  updated successfully!');
    }

        
        
    //     // $user->save();

    //     return redirect()->route('admin.user_list')->with('success', 'User  updated successfully!');
    // }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user_list')->with('success', 'User  deleted successfully!');
    }
}