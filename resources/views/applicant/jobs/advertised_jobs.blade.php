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

        <!-- Add Job Button (if applicable) -->
        <div class="col-md-6 d-flex justify-content-end">
            <!-- If this section is for applicants, you might not need an "Add Job" button -->
            <!-- If for HR/Admin, uncomment below button -->
            <!-- <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addJobModal">
                Add Job
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

    <!-- Advertised Jobs Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>Advertised Jobs</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company Name</th>
                            <th>Location</th>
                            <th>Application Deadline</th>
                            <th>Details</th>
                            <th>Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Software Developer</td>
                            <td>Example Corp</td>
                            <td>New York, USA</td>
                            <td>2024-09-30</td>
                            <td>
                                <a href="{#{ route('job.details', ['id' => 1]) }#}" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">
                                    Apply
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>IT Support Specialist</td>
                            <td>Tech Solutions</td>
                            <td>San Francisco, USA</td>
                            <td>2024-10-15</td>
                            <td>
                                <a href="{#{ route('job.details', ['id' => 2]) }#}" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">
                                    Apply
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Note for No Jobs Available -->
            <!-- @#if($jobs->isEmpty())
                <div class="alert alert-info mt-3">
                    No advertised jobs available.
                </div>
            @#endif -->
        </div>
    </div>

    <!-- Add Job Modal (if applicable) -->
    <!-- <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
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
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Application Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="application_deadline" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Add Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
