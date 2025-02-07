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

        <!-- Add Employment History Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#addEmploymentModal">
                Add Employment History
            </button>
        </div>
    </div>

    <!-- Employment History Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Employment History</h5>
        </div>
        <div class="card-body">
            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($employmentHistory->isEmpty())
                <p class="text-center">No employment history details available. 
                   <a href="#" data-bs-toggle="modal" data-bs-target="#addEmploymentModal">Click here to add one</a>.
                </p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Months</th>
                                <th>Responsibilities</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employmentHistory as $index => $employment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employment->company_name }}</td>
                                    <td>{{ $employment->job_title }}</td>
                                    <!-- Consistent date format using Carbon -->
                                    <td>{{ \Carbon\Carbon::parse($employment->start_date)->format('d-m-Y') }}</td>
                                    <td>{{ $employment->end_date ? \Carbon\Carbon::parse($employment->end_date)->format('d-m-Y') : 'Present' }}</td>
                                    <!-- Calculate total months of employment -->
                                    <td>{{ \Carbon\Carbon::parse($employment->start_date)->diffInMonths($employment->end_date ?? now()) }} months</td>
                                    <td>{{ $employment->responsibilities }}</td>
                                    <td>
                                        <!-- Edit button with tooltip -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEmploymentModal" data-id="{{ $employment->id }}" title="Edit Employment">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <!-- Delete form with confirmation prompt -->
                                        <form action="{{ route('applicant.employment_delete', $employment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Employment">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Add Employment Modal -->
    <div class="modal fade" id="addEmploymentModal" tabindex="-1" aria-labelledby="addEmploymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmploymentModalLabel">Add Employment History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.employment_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="job_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="responsibilities" class="form-label">Responsibilities</label>
                            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3" required></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="currentlyEmployed" name="currently_employed">
                            <label class="form-check-label" for="currentlyEmployed">Currently Employed Here</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employment Modal -->
    <div class="modal fade" id="editEmploymentModal" tabindex="-1" aria-labelledby="editEmploymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content dynamically loaded using JS or AJAX -->
            </div>
        </div>
    </div>

    <script>
        // JavaScript for handling 'Currently Employed' checkbox behavior
        document.getElementById('addEmploymentModal').addEventListener('show.bs.modal', function (event) {
            var currentlyEmployedCheckbox = document.getElementById('currentlyEmployed');
            var endDateInput = document.getElementById('endDate');

            currentlyEmployedCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    endDateInput.value = ''; // Clear the end date if currently employed
                    endDateInput.disabled = true; // Disable end date field
                } else {
                    endDateInput.disabled = false; // Enable end date field
                }
            });
        });

        // Reset the form when the modal is closed
        $('#addEmploymentModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

        // JavaScript for dynamically loading the edit modal with existing data
        $('#editEmploymentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var employmentId = button.data('id');

            var modal = $(this);
            // Make an AJAX request to fetch the employment details by ID
            $.ajax({
                url: '/employment/' + employmentId + '/edit',
                method: 'GET',
                success: function(data) {
                    modal.find('.modal-content').html(data);
                },
                error: function() {
                    alert('Failed to load data, please try again.');
                }
            });
        });
    </script>
@endsection
