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

        <!-- Add Application Button (if applicable) -->
        <div class="col-md-6 d-flex justify-content-end">
            <!-- If you have an option for the applicant to add or manage applications, uncomment below button -->
            <!-- <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addApplicationModal">
                Add Application
            </button> -->
        </div>
    </div>

    <!-- Flash Messages Section -->
    <!-- @#if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {#{ session('status') }#}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @#endif -->

    <!-- Application History Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Application History</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Software Developer</td>
                            <td>2024-07-15</td>
                            <td>Under Review</td>
                            <td>
                                <a href="{#{ route('application.details', ['id' => 1]) }#}" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>IT Support Specialist</td>
                            <td>2024-08-01</td>
                            <td>Shortlisted</td>
                            <td>
                                <a href="{#{ route('application.details', ['id' => 2]) }#}" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Note for No Applications -->
            <!-- @#if($applications->isEmpty())
                <div class="alert alert-info mt-3">
                    No application history available.
                </div>
            @#endif -->
        </div>
    </div>

    <!-- Add Application Modal (if applicable) -->
    <!-- <div class="modal fade" id="addApplicationModal" tabindex="-1" aria-labelledby="addApplicationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addApplicationModalLabel">Add Application</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="job_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateApplied" class="form-label">Date Applied</label>
                            <input type="date" class="form-control" id="dateApplied" name="date_applied" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="under_review">Under Review</option>
                                <option value="shortlisted">Shortlisted</option>
                                <option value="rejected">Rejected</option>
                                <option value="accepted">Accepted</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Add Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
