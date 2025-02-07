@extends('layouts.layout')

@section('title', isset($singleJob) ? $singleJob->title : 'VTECH Recruitment Portal')

@section('main')
    <div class="container">
        <!-- Back to Dashboard Button -->
        <div class="row mb-4 mt-5">
            <div class="col-md-6">
                <button type="button" class="btn btn-warning btn-sm mt-2">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none">
                        <i class="bi bi-arrow-left"></i> <span class="text-dark">Back to Jobs</span>
                    </a>
                </button>
            </div>
        </div>

        
        
        <table class="table">
            <thead>
                <tr>
                    <th><h1>{{ $singleJobPosting->title }}</h1></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Advert No:</strong></td> <td>{{ $singleJobPosting->advert_no }}</td>
                </tr>
                <tr>
                    <td><strong>Position Required:</strong></td> <td>{{ $singleJobPosting->position_needed }}</td>
                </tr>
                <tr>
                    <td><strong>Description:</strong></td> <td>{{ $singleJobPosting->description }}</td>
                </tr>
                <tr>
                    <td><strong>Application Deadline:</strong></td> <td>{{ $singleJobPosting->application_deadline }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
        <a href="" class="btn btn-primary">Apply Job</a>
        </div>
    </div>
@endsection