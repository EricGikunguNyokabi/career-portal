@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="row">
        <div class="col-md-12">
            <h5>Edit Education Background</h5>
            <!-- Debugging: Output the education ID -->
            <p>Education ID: {{ $education->id }}</p>
            <form action="{{ route('applicant.education_update', ['id' => $education->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="institutionName" class="form-label">Institution Name</label>
                    <input type="text" class="form-control" id="institutionName" name="institution_name" value="{{ $education->institution_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="academicLevel" class="form-label">Academic Level</label>
                    <select class="form-select" id="academicLevel" name="academic_level" required>
                        <option value="" disabled>Select Academic Level</option>
                        <option value="Bachelor's Degree" {{ $education->academic_level == "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                        <option value="Diploma" {{ $education->academic_level == "Diploma" ? 'selected' : '' }}>Diploma</option>
                        <option value="Master's Degree" {{ $education->academic_level == "Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" name="course" value="{{ $education->course }}" required>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <select class="form-select" id="grade" name="grade" required>
                        <option value="" disabled>Select Grade</option>
                        <option value="A" {{ $education->grade == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $education->grade == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $education->grade == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $education->grade == 'D' ? 'selected' : '' }}>D</option>
                        <option value="E" {{ $education->grade == 'E' ? 'selected' : '' }}>E</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" value="{{ $education->start_date->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="end_date" value="{{ $education->end_date ? $education->end_date->format('Y-m-d') : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Education</button>
            </form>
        </div>
    </div>
@endsection
