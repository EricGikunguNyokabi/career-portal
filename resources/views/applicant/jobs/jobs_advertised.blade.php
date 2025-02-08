@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="container-fluid mt-2">
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

        <!-- Advertised Jobs Table -->
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
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Reference No</th>
                                    <th>Description</th>
                                    <th>Posted On</th>
                                    <th>Posted On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->title ?? '' }}</td>
                                        <td> {{ $job->advert_no }} </td>
                                        <td>{!! nl2br(e(str_replace('.', '.',   $job->description))) !!}</td>
                                        <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $job->application_deadline->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('applicant.single_job_posting', $job->id) }}" class="btn btn-primary btn-sm">View Job</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection