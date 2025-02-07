@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
<div class="modal-header">
    <h5 class="modal-title" id="editOtherTrainingModalLabel">Edit Other Training</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('applicant.other_trainings_update', $otherTraining->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="institutionName" class="form-label">Institution Name</label>
            <input type="text" class="form-control" id="institutionName" name="institution_name" value="{{ $otherTraining->institution_name }}" required>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course" value="{{ $otherTraining->course }}" required>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="start_date" value="{{ $otherTraining->start_date->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="endDate" name="end_date" value="{{ $otherTraining->end_date ? $otherTraining->end_date->format('Y-m-d') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection