@extends('layouts.layout')

@section('title', 'Create User')

@section('side_navbar')
    @include('layouts.admin')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Create New User</h1>
    <form action="{{ route('admin.store_user') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required autofocus>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="applicant">Applicant</option>
                <option value="hr_team">HR</option>
                <option value="management">Management</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
        <a href="{{ route('admin.user_list') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection