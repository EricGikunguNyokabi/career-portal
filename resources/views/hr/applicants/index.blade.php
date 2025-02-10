@extends('layouts.layout')

@section('title', 'All Applicants')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
    <div class="container-fluid mt-3">
        <h1 class="text-center mb-4">Applicants Information</h1>

        <!-- Applicants Table -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Applicant's Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Position Applied</th>
                    <th scope="col">Application Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applicant as $index => $application)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $application->applicant->first_name }} {{ $application->applicant->middle_name }} {{ $application->applicant->last_name }}</td>
                        <td>{{ $application->applicant->email }}</td>

                        <td>
                            @if($application->status == 'pending')
                                <span class="btn btn-warning btn-sm">Pending</span>
                            @elseif($application->status == 'reviewed')
                                <span class="btn btn-primary btn-sm">Reviewed</span>
                            @elseif($application->status == 'shortlisted')
                                <span class="btn btn-success btn-sm">Shortlisted</span>
                            @elseif($application->status == 'rejected')
                                <span class="btn btn-danger btn-sm">Rejected</span>
                            @elseif($application->status == 'hired')
                                <span class="btn btn-info btn-sm">Hired</span>
                            @endif
                        </td>

                        <td>{{ $application->applicant->phone_number }}</td>
                        <td>{{ $application->job->title }}</td>
                        <td>{{ $application->created_at->format('d-m-Y') }}</td>
                        <td>
                        <a href="{{ route('hr.applicants.view', $application->id ) }}" class="btn btn-info btn-sm">
                            View 
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
