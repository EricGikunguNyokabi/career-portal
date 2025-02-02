@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.applicant_sidebar')
@endsection

@section('main')
    <div class="row mt-2">
        <!-- Back to Dashboard Button -->
        <div class="col-md-6">
            <button type="button" class="btn btn-warning btn-sm mt-2">
                <a href="#" class="text-white text-decoration-none">
                    <i class="bi bi-arrow-left"></i> <span class="text-dark">Back to Dashboard</span>
                </a>
            </button>
        </div>

        <!-- Add File Upload Button -->
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                Upload File
            </button>
        </div>
    </div>

    <!-- Flash Messages Section -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Files Table or No Files Available -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>Uploaded Files</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th>Uploaded On</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Rows -->
                        <!-- @#foreach($files as $file)
                        <tr>
                         
                        </tr>
                        @#endforeach -->
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- @#if($files->isEmpty())
                <div class="alert alert-info mt-3">
                    No files available.
                </div>
            @#endif -->
        </div>
    </div>

    <!-- File Upload Modal -->
    <div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFileModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Select File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="resume">Resume</option>
                                <option value="certificate">Certificate</option>
                                <option value="id">ID</option>
                                <option value="transcript">Transcript</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
