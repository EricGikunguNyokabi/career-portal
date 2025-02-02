<!-- resources/views/admin/job_postings/show.blade.php -->
@extends('layouts.master')

@section('title', 'Job Posting Details')

@section('main')
<div class="container mt-5">
    <h1 class="text-center">{{ $jobPosting->title }}</h1>
    <p><strong>Position Needed:</strong> {{ $jobPosting->position_needed }}</p>
    <p><strong>Job Grade:</strong> {{ $jobPosting->job_grade }}</p>
    <p><strong>Advert No:</strong> {{ $jobPosting->advert_no }}</p>
    <p><strong>Description:</strong> {{ $jobPosting->description }}</p>
    <a href="{{ route('admin.job_postings') }}" class="btn btn-secondary">Back to Job Postings</a>
</div>
@endsection