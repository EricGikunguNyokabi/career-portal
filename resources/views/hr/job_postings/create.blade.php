<!-- resources/views/admin/job_postings/create.blade.php -->
@extends('layouts.layout')

@section('title', 'Create Job Posting')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Create Job Posting</h1>
    <form action="{{ route('hr.job_posting.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="position_needed">Position Needed</label>
            <input type="number" class="form-control" id="position_needed" name="position_needed" required>
        </div>
        <div class="form-group">
            <label for="job_grade">Job Grade</label>
            <input type="text" class="form-control" id="job_grade" name="job_grade">
        </div>
        <div class="form-group">
            <label for="advert_no">Advert No</label>
            <input type="text" class="form-control" id="advert_no" name="advert_no">
        </div>
        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="application_deadline">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
        </div>
        <button type="submit" class="btn btn-success">Create Job Posting</button>
        <a href="{{ route('hr.job_postings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection