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

        <!-- Add Other Training Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addOtherTrainingModal">
                Add Other Training
            </button>
        </div>
    </div>

    <!-- Other Training Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Other Trainings</h5>
        </div>
        <div class="card-body">
            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($otherTrainings->isEmpty())
                <p class="text-center">No other training details available. 
                   <a href="#" data-bs-toggle="modal" data-bs-target="#addOtherTrainingModal">Click here to add one</a>.
                </p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Institution Name</th>
                                <th>Course</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($otherTrainings as $index => $training)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $training->institution_name }}</td>
                                    <td>{{ $training->course }}</td>
                                    <td>{{ \Carbon\Carbon::parse($training->start_date)->format('d-m-Y') }}</td>
                                    <td>{{ $training->end_date ? \Carbon\Carbon::parse($training->end_date)->format('d-m-Y') : 'N/A' }}</td>
                                    <td>
                                    <a href="{{ route('applicant.other_trainings_edit', $training->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    </td>
                                    <td>
                                        <form action="{{ route('applicant.other_trainings_delete', $training->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Other Training">
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

    <!-- Add Other Training Modal -->
    <div class="modal fade" id="addOtherTrainingModal" tabindex="-1" aria-labelledby="addOtherTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOtherTrainingModalLabel">Add Other Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.other_trainings_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="institutionName" class="form-label">Institution Name</label>
                            <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" class="form-control" id="course" name="course" required>
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