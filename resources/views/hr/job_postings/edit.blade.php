<!-- resources/views/admin/job_postings/edit.blade.php -->
@extends('layouts.layout')

@section('title', 'Edit Job Posting')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Edit Job Posting</h1>
    <form action="{{ route('hr.job_posting.update', $jobPosting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $jobPosting->title }}" required>
        </div>
        <div class="form-group">
            <label for="position_needed">Position Needed</label>
            <input type="number" class="form-control" id="position_needed" name="position_needed" value="{{ $jobPosting->position_needed }}" required>
        </div>
        <div class="form-group">
            <label for="job_grade">Job Grade</label>
            <input type="text" class="form-control" id="job_grade" name="job_grade" value="{{ $jobPosting->job_grade }}">
        </div>
        <div class="form-group">
            <label for="advert_no">Advert No</label>
            <input type="text" class="form-control" id="advert_no" name="advert_no" value="{{ $jobPosting->advert_no }}">
        </div>
        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ $jobPosting->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="application_deadline">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" 
                value="{{ $jobPosting->application_deadline ? $jobPosting->application_deadline->format('Y-m-d') : '' }}">
        </div>

        <button type="submit" class="btn btn-success">Update Job Posting</button>
        <a href="{{ route('hr.job_postings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection