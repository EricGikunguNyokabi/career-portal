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
    </div>

    <!-- Flash Messages Section -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                        @forelse($applications as $index => $application)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $application->job ? $application->job->title : 'Job not found' }}</td>
                                <td>{{ $application->created_at->format('Y-m-d') }}</td>
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
                                <td>
                                    <a href="{{ route('applicant.single_job_posting', $application->job_id) }}" class="btn btn-info btn-sm">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No application history available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
