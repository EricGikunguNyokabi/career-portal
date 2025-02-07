@extends('layouts.layout')

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

    <!-- Add Training Button -->
    <div class="col-md-6 d-flex justify-content-end me-3">
        <button type="button" class="btn btn-primary btn-sm mt-2 me-5" data-bs-toggle="modal" data-bs-target="#addTrainingModal">
            Add Training
        </button>
    </div>
</div>

    <!-- Flash Messages Section -->
    <!-- @#if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {#{ session('status') }#}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @#endif -->

    <!-- Trainings Table or No Details Available -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Trainings</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Institution</th>
                            <th>Course Name</th>
                            <th>Duration</th>
                            <th>Certification</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row - you should loop through the trainings from your database -->
                        <tr>
                            <td>1</td>
                            <td>Project Management</td>
                            <td>Global Institute</td>
                            <td>3 Months</td>
                            <td>Yes</td>
                            <td>2022-01-01</td>
                            <td>2022-03-31</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- Add additional rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Training Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrainingModalLabel">Add Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.training_profile') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="trainingName" class="form-label">Training Name</label>
                            <input type="text" class="form-control" id="trainingName" name="training_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="institutionName" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="certification" class="form-label">Certification</label>
                            <select class="form-select" id="certification" name="certification" required>
                                <option value="" disabled selected>Select Certification</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
