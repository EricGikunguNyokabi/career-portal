@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="row mt-2">
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
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addEducationModal">
                Add Education Background
            </button>
        </div>
    </div>

    <!-- Flash Messages Section -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Education Background Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>Education Background</h5>
        </div>
        <div class="card-body">
            @if($educations->isEmpty())
                <p class="text-center">No education background details available. 
                   <a href="#" data-bs-toggle="modal" data-bs-target="#addEducationModal">Click here to add one</a>.
                </p>
            @else
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
                            @foreach($educations as $index => $education)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $education->institution_name }}</td>
                                    <td>{{ $education->academic_level }}</td>
                                    <td>{{ $education->course }}</td>
                                    <td>{{ $education->grade }}</td>
                                    <td>{{ $education->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $education->end_date ? $education->end_date->format('Y-m-d') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('applicant.education_edit', $education->id) }}" class="btn btn-warning btn-sm">Edit</a>

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
            @endif
        </div>
    </div>

    <!-- Add Education Modal -->
    <div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEducationModalLabel">Add Education Background</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.education_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="institutionName" class="form-label">Institution Name</label>
                            <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="academicLevel" class="form-label">Academic Level</label>
                            <input type="text" class="form-control" id="academicLevel" name="academic_level" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" class="form-control" id="course" name="course" required>
                        </div>
                        <div class="mb-3">
                            <label for="grade" class="form-label">Grade</label>
                            <input type="text" class="form-control" id="grade" name="grade" required>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection