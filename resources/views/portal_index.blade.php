@extends('layouts.layout')

@section('title', 'VTECH Recruitment Portal')

@section('main')
<div class="container mt-5">
    <!-- Company Information -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 text-bold">Welcome to VTECH Recruitment Portal</h1>
            <p class="lead">At VTECH, we strive to provide an efficient and user-friendly recruitment experience. Our portal connects talented individuals with exciting job opportunities in various sectors. We are committed to upholding the highest standards of data privacy and ensuring a smooth application process for all users.</p>
        </div>
    </div>

    <!-- Data Privacy Act -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h4 class="font-weight-bold">Data Privacy and Protection</h4>
            <p>Your privacy is important to us. Please review our data protection practices in accordance with the Kenyan Data Privacy Act by clicking the link below:</p>
            <a href="https://mzalendo.com/media/resources/Data_Protection_Act_2019_Popular_Version.pdf" class="btn btn-primary btn-lg" target="_blank">View Kenyan Data Privacy Act</a>
        </div>
    </div>

    <!-- Job Vacancies -->
    <div class="mt-4">
        <h2 class="text-center text-bold">Current Job Vacancies</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Job Title</th>
                        <th>Position Needed</th>
                        <th>Job Grade</th>
                        <th>Advert No</th>
                        <th>Application Deadline</th>
                        <th>View Advert Details</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($jobPostings as $jobPosting)
                        <tr>
                            <th>{{ $loop->iteration }}  </th>
                            <td>{{ $jobPosting->title }} </td>
                            <td>{{ $jobPosting->position_needed }} </td>
                            <td>{{ $jobPosting->job_grade }} </td>
                            <td>{{ $jobPosting->advert_no }} </td>
                            <td>{{ $jobPosting->application_deadline->format('d-m-Y') }}</td>
                            <td style="display:flex; align-items:center;">
                                <a href="{{ route('view.single.job', ['id'=> $jobPosting->id] ) }}" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h4 class="font-weight-bold">Join Our Team!</h4>
            <p>We are always looking for talented individuals to join our team. If you don't see a position that fits your skills, feel free to <a href="#" class="text-primary">submit your resume</a> for future opportunities.</p>
        </div>
    </div>
</div>
@endsection