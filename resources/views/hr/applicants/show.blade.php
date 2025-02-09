@extends('layouts.layout')

@section('title', 'Applicant Details')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Applicant Details</h2>

        <div class="card shadow-sm p-4">
            
            <!-- Personal Information -->
            <h4 class="mb-3">Personal Information</h4>
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
                <tr>
                    <th>Profile Picture</th>
                    <td>
                        <img src="{{ asset($application->applicant->profile_picture) }}" 
                            alt="Profile Picture" 
                            class="img-thumbnail" width="150">
                    </td>
                </tr>
            </table>

            <!-- Education Background -->
<h4 class="mt-4">Education Background</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Degree</th>
            <th>Institution</th>
            <th>Year of Completion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($application->applicant->education as $education)
            <tr>
                <td>{{ $education->academic_level }}</td>
                <td>{{ $education->institution_name }}</td>
                <td>{{ $education->end_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


           




        </div>

        <div class="card shadow-sm p-4 mt-4">
            <h4 class="mb-3">Job Applied For</h4>
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
