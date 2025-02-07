@extends('layouts.layout')

@section('title', 'Edit User')

@section('side_navbar')
    @include('layouts.admin')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Edit User</h1>
    <form action="{{ route('admin.update_user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $user->middle_name }}" >
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="applicant" {{ $user->role == 'applicant' ? 'selected' : '' }}>Applicant</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="hr_team" {{ $user->role == 'hr_team' ? 'selected' : '' }}>HR</option>
                <option value="management" {{ $user->role == 'management' ? 'selected' : '' }}>Management</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('admin.user_list') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection