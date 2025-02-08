@extends('layouts.layout')

@section('title', 'Edit Employment History')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Edit Employment History</h1>
    <form action="{{ route('applicant.employment_update', $employmentHistory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="institutionName" class="form-label">Institution Name</label>
            <input type="text" class="form-control" id="institutionName" name="company_name" value="{{ $employmentHistory->company_name }}" required>
        </div>

        <div class="mb-3">
            <label for="jobTitle" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="jobTitle" name="job_title" value="{{ $employmentHistory->job_title }}" required>
        </div>

        <div class="mb-3">
            <label for="responsibilities" class="form-label">Responsibilities</label>
            <textarea class="form-control" style="min-height: 20vh;" name="responsibilities" id="responsibilities" required>{{ $employmentHistory->responsibilities }}</textarea>
        </div>

        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="start_date" value="{{ \Carbon\Carbon::parse($employmentHistory->start_date)->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="endDate" name="end_date" value="{{ $employmentHistory->end_date ? \Carbon\Carbon::parse($employmentHistory->end_date)->format('Y-m-d') : '' }}">
            </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
