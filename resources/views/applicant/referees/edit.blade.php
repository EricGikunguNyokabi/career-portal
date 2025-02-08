@extends('layouts.layout')

@section('title', 'Edit Employment History')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection 

@section('main')
<div class="container mt-5">
    <h1 class="text-center">Edit Employment History</h1>
    <form id="editRefereeForm" action="{{ route('applicant.referees.update', $referee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="refereeId" name="referee_id">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" value="{{ $referee->name }}" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" value="{{ $referee->email }}"  name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="editPhone" value="{{ $referee->phone }}"  name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRelationship" class="form-label">Relationship</label>
                        <input type="text" class="form-control" id="editRelationship" value="{{ $referee->relationship }}"  name="relationship" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                </form>
</div>
@endsection
