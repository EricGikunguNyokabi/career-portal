<!-- resources/views/admin/job_postings/index.blade.php -->
@extends('layouts.layout')

@section('title', 'Job Postings')

@section('side_navbar')
    @include('layouts.mgt')
@endsection 

@section('main')
<div class="container-fluid mt-5">
    <h1 class="text-center">Job Postings</h1>
  
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
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection