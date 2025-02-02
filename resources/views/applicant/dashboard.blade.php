@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center mt-4">Applicant Dashboard</h2>
            </div>
        </div>

        <!-- Notifications and Cards -->
        <div class="row">
            <!-- Notification Card -->
            <div class="col-md-12 mb-4">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Congratulations!</strong> You have been shortlisted for an interview. Check your application status for more details.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <!-- Available Vacancies Card -->
            <div class="col-md-12 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Available Vacancies</h5>
                        <h1 class="display-4">
                            <span class="badge rounded-pill bg-primary">12</span> <!-- Total number of vacancies -->
                        </h1>
                        <p class="card-text">Explore the latest job openings available in our portal.</p>
                        <a href="{#{ route('applicant.jobs') }#}" class="btn btn-primary">View Vacancies</a>
                    </div>
                </div>
            </div>

            <!-- Links Cards -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Profile</h5>
                        <p class="card-text">Update your personal details and resume.</p>
                        <a href="{#{ route('applicant.profile') }#}" class="btn btn-secondary">View Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Application History</h5>
                        <p class="card-text">Review your past job applications and their statuses.</p>
                        <a href="{#{ route('applicant.application_history') }#}" class="btn btn-secondary">View History</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Referees</h5>
                        <p class="card-text">Manage your list of referees for job applications.</p>
                        <a href="{#{ route('applicant.referees') }#}" class="btn btn-secondary">View Referees</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
