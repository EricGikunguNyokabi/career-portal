@extends('layouts.app')

@section('side_navbar')
    @include('components.applicant_sidebar')
@endsection

@section('main')
    <div class="row">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Personal Details</h5>
                    <p class="card-text">Update your personal details here.</p>
                    <!-- Personal details form goes here -->
                </div>
            </div>
        </div>
    </div>
@endsection
