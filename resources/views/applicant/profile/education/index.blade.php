@extends('layouts.master')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="row">
        <!-- Back to Dashboard Button -->
        <div class="col-md-6">
            <button type="button" class="btn btn-warning btn-sm mt-2">
                <a href="{{ route('applicant.dashboard') }}" class="text-white text-decoration-none">
                    <i class="bi bi-arrow-left"></i> <span class="text-dark">Back to Dashboard</span>
                </a>
            </button>
        </div>

        <!-- Add Education Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('applicant.education_create') }}" class="btn btn-primary btn-sm mt-2">
                Add Education Background
            </a>
        </div>
    </div>

    <!-- Flash Messages Section -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Education Background Table or No Details Available -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Education Background</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Institution Name</th>
                            <th>Academic Level</th>
                            <th>Course</th>
                            <th>Grade</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($educations as $education)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $education->institution_name }}</td>
                            <td>{{ $education->academic_level }}</td>
                            <td>{{ $education->course }}</td>
                            <td>{{ $education->grade }}</td>
                            <td>{{ $education->start_date->format('Y-m-d') }}</td>
                            <td>{{ $education->end_date ? $education->end_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('applicant.education_edit', $education->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('applicant.education_destroy', $education->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
