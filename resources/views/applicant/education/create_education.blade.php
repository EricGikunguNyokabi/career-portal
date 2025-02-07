@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Add Education</h1>

    <form action="{{ route('applicant.education_store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="institution_name">Institution Name</label>
            <input type="text" id="institution_name" name="institution_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="academic_level">Academic Level</label>
            <input type="text" id="academic_level" name="academic_level" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" id="grade" name="grade" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
