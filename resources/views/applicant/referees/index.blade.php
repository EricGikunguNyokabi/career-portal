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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Referees Table -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>My Referees</h5>
        </div>
        <div class="card-body">
            @if($referees->isEmpty())
                <p class="text-center">No referees available. 
                   <a href="#" data-bs-toggle="modal" data-bs-target="#addRefereeModal">Click here to add one</a>.
                </p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Relationship</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($referees as $index => $referee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $referee->name }}</td>
                                    <td>{{ $referee->email }}</td>
                                    <td>{{ $referee->phone }}</td>
                                    <td>{{ $referee->relationship }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editRefereeModal" data-id="{{ $referee->id }}">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ route('applicant.referees.delete', $referee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this referee?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
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

    <!-- Add Referee Modal -->
    <div class="modal fade" id="addRefereeModal" tabindex="-1" aria-labelledby="addRefereeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRefereeModalLabel">Add Referee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applicant.referees.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="relationship" class="form-label">Relationship</label>
                            <input type="text" class="form-control" id="relationship" name="relationship" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Referee Modal -->
    <div class="modal fade" id="editRefereeModal" tabindex="-1" aria-labelledby="editRefereeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRefereeModalLabel">Edit Referee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRefereeForm" action="{{ route('applicant.referees.update', $referee->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="refereeId" name="referee_id">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" value="{{ $referee->name }}" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" value="{{ $referee->email }}" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editPhone" value="{{ $referee->phone }}" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRelationship" class="form-label">Relationship</label>
                            <input type="text" class="form-control" id="editRelationship" value="{{ $referee->relationship }}" name="relationship" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for dynamically loading the edit modal with existing data
        $('#editRefereeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var refereeId = button.data('id');

            var modal = $(this);
            // Make an AJAX request to fetch the referee details by ID
            $.ajax({
                url: '/referees/' + refereeId + '/edit',
                method: 'GET',
                success: function(data) {
                    modal.find('.modal-body').html(data);
                },
                error: function() {
                    alert('Failed to load data, please try again.');
                }
            });
        });
    </script>
@endsection