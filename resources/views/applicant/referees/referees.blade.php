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

        <!-- Add Referee Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addRefereeModal">
                Add Referee
            </button>
        </div>
    </div>

    <!-- Flash Messages Section -->
   

    <!-- Referees Table or No Details Available -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Referees</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Institution/Company</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Example Corp</td>
                            <td>John Doe</td>
                            <td>Former Manager</td>
                            <td>+1234567890</td>
                            <td>john.doe@example.com</td>
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
                        <tr>
                            <td>2</td>
                            <td>Tech Solutions</td>
                            <td>Jane Smith</td>
                            <td>Colleague</td>
                            <td>+0987654321</td>
                            <td>jane.smith@example.com</td>
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
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
          
        </div>
    </div>

    <!-- Add Referee Modal -->
    <div class="modal fade" id="addRefereeModal" tabindex="-1" aria-labelledby="addRefereeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRefereeModalLabel">Add Referee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="institutionName" class="form-label">Institution/Company</label>
                            <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="refereeName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="refereeName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="refereePosition" class="form-label">Position</label>
                            <input type="text" class="form-control" id="refereePosition" name="position" required>
                        </div>
                        <div class="mb-3">
                            <label for="refereeContact" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="refereeContact" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="refereeEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="refereeEmail" name="email_address" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
