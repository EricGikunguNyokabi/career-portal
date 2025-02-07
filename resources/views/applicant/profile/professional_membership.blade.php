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

        <!-- Add Membership Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addMembershipModal">
                Add Membership
            </button>
        </div>
    </div>

    <!-- Flash Messages Section -->
    <!-- @#if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {#{ session('status') }#}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @#endif -->

    <!-- Professional Membership Table or No Details Available -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Professional Memberships</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Membership Name</th>
                            <th>Certification Body</th>
                            <th>Membership Number</th>
                            <th>Date of Registration/Certification</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row -->
                        <tr>
                            <td>1</td>
                            <td>Certified Information Systems Auditor (CISA)</td>
                            <td>ISACA</td>
                            <td>123456789</td>
                            <td>2023-01-01</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <!-- Additional rows would be dynamically generated -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Membership Modal -->
    <div class="modal fade" id="addMembershipModal" tabindex="-1" aria-labelledby="addMembershipModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMembershipModalLabel">Add Professional Membership</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="membershipName" class="form-label">Membership Name</label>
                            <input type="text" class="form-control" id="membershipName" name="membership_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="certificationBody" class="form-label">Certification Body</label>
                            <input type="text" class="form-control" id="certificationBody" name="certification_body" required>
                        </div>
                        <div class="mb-3">
                            <label for="membershipNumber" class="form-label">Membership Number</label>
                            <input type="text" class="form-control" id="membershipNumber" name="membership_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="registrationDate" class="form-label">Date of Registration/Certification</label>
                            <input type="date" class="form-control" id="registrationDate" name="registration_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
