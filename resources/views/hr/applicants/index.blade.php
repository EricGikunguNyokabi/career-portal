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
                        <td>{{ $application->applicant->phone_number }}</td>
                        <td>{{ $application->job->title }}</td>
                        <td>{{ $application->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
