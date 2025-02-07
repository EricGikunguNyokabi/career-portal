<!-- resources/views/admin/job_postings/index.blade.php -->
@extends('layouts.layout')

@section('title', 'Job Postings')

@section('side_navbar')
    @include('layouts.admin')
@endsection 

@section('main')
<div class="container-fluid mt-5">
    <h1 class="text-center">Job Postings</h1>
    <div class="mb-3 text-right">
        <a href="{{ route('admin.create_job_posting') }}" class="btn btn-primary">Create New Job Posting</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Job Title</th>
                <th>Position Needed</th>
                <th>Job Grade</th>
                <th>Job Description</th>
                <th>Advert No</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobPostings as $jobPosting)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $jobPosting->title }}</td>
                <td>{{ $jobPosting->position_needed }}</td>
                <td>{{ $jobPosting->job_grade }}</td>
                <td>{{ $jobPosting->description }} </td>
                <td>{{ $jobPosting->advert_no }}</td>
                <td>{{ $jobPosting->application_deadline }}</td>
                <td style="display: flex; align-items: center;">
                    <a href="{{ route('admin.edit_job_posting', $jobPosting->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('admin.delete_job_posting', $jobPosting->id) }}" method="POST" style="margin-left: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job posting?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection