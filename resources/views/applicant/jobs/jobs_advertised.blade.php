@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="container mt-2">
        <div class="row mb-3">
            <!-- Back to Dashboard Button -->
            <div class="col-md-6">
                <button type="button" class="btn btn-warning btn-sm">
                    <a href="{{ route('applicant.dashboard') }}" class="text-white text-decoration-none">
                        <i class="bi bi-arrow-left"></i> <span class="text-dark">Back to Dashboard</span>
                    </a>
                </button>
            </div>
        </div>

        <!-- Flash Messages Section -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Advertised Jobs List -->
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Advertised Jobs</h5>
            </div>
            <div class="card-body">
                @if($jobs->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No jobs available at the moment.
                    </div>
                @else
                    <div class="list-group">
                        @foreach($jobs as $job)
                            <div class="list-group-item d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1">{{ $job->title }}</h5>
                                    <p class="mb-1">{{ Str::limit($job->description, 100) }}</p>
                                </div>
                                <a href="{{ route('applicant.single_job_posting', $job->id) }}" class="btn btn-primary btn-sm">View Job</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection