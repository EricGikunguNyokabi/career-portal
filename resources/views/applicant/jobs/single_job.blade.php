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

    <div class="card mt-3">
        <div class="card-header">
            <h5>{{ $job->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $job->description }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Posted On:</strong> {{ $job->created_at->format('Y-m-d') }}</p>

            <form action="{{ route('applicant.apply_job', $job->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Apply for this Job</button>
            </form>
        </div>
    </div>
@endsection