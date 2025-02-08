@extends('layouts.layout')

@section('title', 'Edit Education')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Edit Education</h1>
    <form action="{{ route('applicant.education_update', $education->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="institutionName" class="form-label">Institution Name</label>
                        <input type="text" class="form-control" id="institutionName" name="institution_name" value="{{ $education->institution_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="academicLevel" class="form-label">Academic Level</label>
                        <input type="text" class="form-control" id="academicLevel" name="academic_level" value="{{ $education->academic_level }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course" name="course" value="{{ $education->course }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" value="{{ $education->grade }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="start_date" value="{{ $education->start_date->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="end_date" value="{{ $education->end_date ? $education->end_date->format('Y-m-d') : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
</div>
@endsection