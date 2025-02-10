@extends('layouts.layout')

@section('title', 'Applicant Details')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Applicant Details</h2>

        <div class="card shadow-sm p-4">
            
            <!-- Personal Information -->
            <h4 class="mb-3">PERSONAL INFORMATION</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $application->applicant->first_name }} {{ $application->applicant->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $application->applicant->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $application->applicant->phone_number }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $application->applicant->address }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $application->applicant->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($application->applicant->gender) }}</td>
                </tr>
                <tr>
                    <th>Profile Picture</th>
                    <td>
                        <img src="{{ asset($application->applicant->profile_picture) }}" 
                            alt="Profile Picture" 
                            class="img-thumbnail" width="150">
                    </td>
                </tr>
            </table>

            <!-- Education Background -->

            <h4>EDUCATION HISTORY</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Academic Level</th>
                        <th>Course</th>
                        <th>Award</th>
                        <th>Institution Name</th>
                        <th>Completion Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($application->applicant->education->isNotEmpty())
                        @foreach($application->applicant->education as $edu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $edu->academic_level }}</td>
                                <td>{{ $edu->course }}</td>
                                <td>{{ $edu->grade }}</td>
                                <td>{{ $edu->institution_name }}</td>
                                <td>{{ $edu->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">No education records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>


            <h4>OTHER TRAININGS</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Course</th>
                        <th>Award</th>
                        <th>Institution Name</th>
                        <th>Completion Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($application->applicant->trainings->isNotEmpty())
                        @foreach($application->applicant->trainings as $training)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $training->course }}</td>
                                <td>{{ $training->grade }}</td>
                                <td>{{ $training->institution_name }}</td>
                                <td>{{ $training->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No training records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <h4>WORK EXPERIENCE</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Roles</th>
                        <th>Completion Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($application->applicant->work_experiences->isNotEmpty())
                        @foreach($application->applicant->work_experiences as $experience)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $experience->job_title }}</td>
                                <td>{{ $experience->company_name }}</td>
                                <td>{{ $experience->responsibilities }}</td>
                                <td>{{ $experience->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No work history records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <h4>REFEREES</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Email</th>
                        <th>Phone</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if($application->applicant->referees->isNotEmpty())
                        @foreach($application->applicant->referees as $referee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $referee->name }}</td>
                                <td>{{ $referee->relationship }}</td>
                                <td>{{ $referee->email }}</td>
                                <td>{{ $referee->phone }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No referee records found</td>
                        </tr>
                    @endif
                </tbody>
            </table>


            <h4>UPLOADED DOCUMENTS</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Document Type</th>
                        
                        <th>File Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($application->applicant->documents->isNotEmpty())
                        @foreach($application->applicant->documents as $document)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $document->document_type }}</td>
                                <td>{{ $document->file_name }}</td>
                               <td>
                                    <a href="{{ route('hr.applicants.document.view', ['id' => $document->file_name]) }}" class="btn btn-info btn-sm" target="_blank">
                                            View Document
                                    </a>
                               </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No document record found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    

        <div class="card shadow-sm p-4 mt-4">
            <h4 class="mb-3">Job Applied For</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Job Title</th>
                    <td>{{ $application->job->title }}</td>
                </tr>
                <tr>
                    <th>Job Description</th>
                    <td>{{ $application->job->description }}</td>
                </tr>
                <tr>
                    <th>Application Date</th>
                    <td>{{ $application->created_at->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>

                <!-- Status Buttons Section -->
        <div class="d-flex justify-content-center mt-4">
            <p class="me-4">CURRENT STATUS : </p>
            @if($application->status == 'pending')
                <span class="btn btn-warning btn-sm">Pending</span>
            @elseif($application->status == 'reviewed')
                <span class="btn btn-primary btn-sm">Reviewed</span>
            @elseif($application->status == 'shortlisted')
                <span class="btn btn-success btn-sm">Shortlisted</span>
            @elseif($application->status == 'rejected')
                <span class="btn btn-danger btn-sm">Rejected</span>
            @elseif($application->status == 'hired')
                <span class="btn btn-info btn-sm">Hired</span>
            @endif
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('hr.applicants.index') }}" class="btn btn-secondary">Back</a>
            
        </div>



        <div class="d-flex justify-content-end mt-4 ms-auto">
            
            <!-- Application Status Update Buttons -->
            <form action="{{ route('hr.applicants.updateStatus', $application->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit" name="status" value="reviewed" class="btn btn-primary btn-sm">Reviewed</button>
                <button type="submit" name="status" value="shortlisted" class="btn btn-success btn-sm">Shortlisted</button>
                <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">Rejected</button>
                <button type="submit" name="status" value="hired" class="btn btn-info btn-sm">Hired</button>
            </form>
        </div>



    </div>
@endsection
