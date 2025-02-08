@extends('layouts.layout')

@section('title', 'Applicant Details')

@section('side_navbar')
    @include('layouts.mgt')
@endsection 

@section('main')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Applicant Details</h2>

        <div class="card shadow-sm p-4">
            <h4 class="mb-3">Applicant's Personal Information</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $application->applicant->first_name }} {{ $application->applicant->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $application->applicant->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $application->applicant->phone_number }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $application->applicant->address }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $application->applicant->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($application->applicant->gender) }}</td>
                </tr>
            </table>
        </div>

        <div class="card shadow-sm p-4 mt-4">
            <h4 class="mb-3">Job Applied for</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Job Title</th>
                    <td>{{ $application->job->title }}</td>
                </tr>
                <tr>
                    <th>Job Description</th>
                    <td>{{ $application->job->description }}</td>
                </tr>
                <tr>
                    <th>Application Date</th>
                    <td>{{ $application->created_at->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('hr.applicants.index') }}" class="btn btn-secondary">Back</a>
            
        </div>
    </div>
@endsection
