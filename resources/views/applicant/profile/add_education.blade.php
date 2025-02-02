@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="row">
        <div class="col-md-12">
            <h5>Add Education Background</h5>
            <form action="{{ route('education.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="institutionName" class="form-label">Institution Name</label>
                    <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                </div>
                <div class="mb-3">
                    <label for="academicLevel" class="form-label">Academic Level</label>
                    <select class="form-select" id="academicLevel" name="academic_level" required>
                        <option value="" disabled selected>Select Academic Level</option>
                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Master's Degree">Master's Degree</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" name="course" required>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <select class="form-select" id="grade" name="grade" required>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="end_date">
                </div>
                <button type="submit" class="btn btn-primary">Add Education</button>
            </form>
        </div>
    </div>
@endsection
