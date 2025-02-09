@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <!-- Back to Dashboard Button -->
    <div class="row mb-4">
        <div class="col-md-6">
            <button type="button" class="btn btn-warning btn-sm mt-2">
                <a href="{{ route('applicant.dashboard') }}" class="text-white text-decoration-none">
                    <i class="bi bi-arrow-left"></i> <span class="text-dark">Back to Dashboard</span>
                </a>
            </button>
        </div>

        <!-- Edit Profile Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                Edit Profile
            </button>
        </div>
    </div>

    <!-- Profile Overview Card -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row">
                <!-- Profile Image -->
                

                <div class="profile-picture col-md-3 d-flex justify-content-center mb-3">
                    @if($user->profile_picture)
                        <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="rounded-circle"  style="width: 150px; height: 150px;">
                    @else
                        <img src="{{ asset('images/DRS-Logo.png') }}" alt="Default Profile Picture" class="rounded-circle"  style="width: 150px; height: 150px;">
                    @endif
                </div>


                <!-- Profile Details -->
                <div class="col-md-9">
                    <h4 class="mb-3">Personal Details</h4>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Contact Number:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->phone_number }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Alternative Contact Number:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->alternative_number }}
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <strong>Address:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $user->address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Additional Information Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Personal Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
                    <p><strong>Gender:</strong> {{ $user->gender }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Contact Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Emergency Contact:</strong> {{ $user->emergency_number }} </p>
                    <!-- <p><strong>LinkedIn:</strong>  </p> -->
                </div>
            </div>
        </div>
    </div>

   

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.profile.update' ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- row -->
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3">
                            <div class="col mb-3">
                                <label for="first_name" class="form-label">First Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                            </div>
                            <div class="col mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $user->middle_name }}">
                            </div>
                            <div class="col mb-3">
                                <label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <!-- row -->
                        <div class="row row-cols-2 row-cols-md-3">
                            <div class="col mb-3">
                                <label for="phone_number" class="form-label">Phone Number <span class="required">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                            </div>
                            
                            <div class="col mb-3">
                                <label for="alternative_number" class="form-label">Other Phone</label>
                                <input type="text" class="form-control" id="alternative_number" name="alternative_number" value="{{ $user->alternative_number }}">
                            </div>
                            <div class="col mb-3">
                                <label for="emergency_number" class="form-label">Emergency Number</label>
                                <input type="text" class="form-control" id="emergency_number" name="emergency_number" value="{{ $user->emergency_number }}">
                            </div>
                        </div>

                        

                        <div class="mb-3">
                            <label for="address" class="form-label">Address <span class="required">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth <span class="required">*</span></label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender <span class="required">*</span></label>
                            <select class="form-select form-control" id="gender" name="gender" required>
                                <option value="">Click to Select</option>
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <!-- Profile picture -->
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture <span class="required">*</span></label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                        </div>


                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
