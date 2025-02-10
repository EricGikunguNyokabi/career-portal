@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.hr')
@endsection 

@section('main')
    <div class="container mt-3">
        <!-- Dashboard Header -->
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 class="text-center">HR Dashboard</h2>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row row-cols-3 row-cols-md-3">
            <div class="col">
                <a href="{{ route('hr.job_postings.index')}}">
                    <div class="card bg-info text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">No of Job Categories Posted</h5>
                            <h3 class="card-text">{{ $jobPostings }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('hr.job_postings.index')}}">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Positions Required</h5>
                            <h3 class="card-text">{{ $positionsRequired }}</h3>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col">
                <a href="{{ route('hr.applicants.index')}}">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Applications Received</h5>
                            <h3 class="card-text">{{ $applications }}</h3>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="text-uppercase mb-0">📢 Notifications</h5>
                    </div>
                    <div class="card-body">
                        @if(auth()->user()->unreadNotifications->isEmpty())
                            <p class="text-center text-muted fw-bold">🚀 No Notifications Available</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Message</th>
                                            <th>Received At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(auth()->user()->unreadNotifications as $index => $notification)
                                            <tr class="align-middle">
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-success fw-bold">
                                                    {{ $notification->data['message'] ?? 'No message available' }}
                                                </td>
                                                <td class="text-info">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ $notification->data['url'] ?? '#' }}" 
                                                    class="btn btn-sm btn-outline-primary">
                                                        🔗 View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>





        <!-- Charts and Graphs -->

        <div class="row row-cols-1 row-cols-md-1">
            <div class="col">
                <div class="card mb-3 mt-3">
                    <div class="card-header text-uppercase">
                        <h5>No of Job Postings by Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="jobPostingsChart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var jobData = @json($jobCategories);
        
        var titles = jobData.map(item => item.title);
        var positions = jobData.map(item => item.total_positions);

        // Generate random colors for each bar
        var backgroundColors = titles.map(() => `hsl(${Math.random() * 360}, 70%, 60%)`);
        var borderColors = titles.map(() => `hsl(${Math.random() * 360}, 70%, 40%)`);

        var ctx = document.getElementById('jobPostingsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: titles,
                datasets: [{
                    // label: 'Positions Needed',
                    data: positions,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Positions Needed'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Job Categories'
                        }
                    }
                }
            }
        });
    });
</script>



@endsection
