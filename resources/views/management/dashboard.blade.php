@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.mgt')
@endsection 

@section('main')
    <div class="container mt-3">
        <!-- Dashboard Header -->
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 class="text-center">MANAGEMENT DASHBOARD</h2>
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
