@extends('layouts.layout')

@section('title', 'User  Management')

@section('side_navbar')
    @include('layouts.admin')
@endsection 

@section('main')
<div class="container-fluid mt-5">
    <h1 class="text-center">User  Management</h1>
    <div class="mb-3 text-right">
        <a href="{{ route('admin.create_user') }}" class="btn btn-primary">Create New User</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td> <!-- Assuming 'role' is a column in the users table -->
                <td style="display: flex; align-items: center;">
                    <a href="{{ route('admin.edit_user', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('admin.delete_user', $user->id) }}" method="POST" style="margin-left: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection