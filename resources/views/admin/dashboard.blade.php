@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.admin')
@endsection 

@section('main')
    <div class="container-fluid mt-5">
        <!-- Dashboard Header -->
        <div class="row mb-3 mt-5">
            <div class="col-md-12">
                <h2 class="text-center">Admin Dashboard</h2>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row row-cols-4 row-cols-md-4 mb-4 text-uppercase">
            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Jobs Posted</h5>
                            <h3 class="card-text">{{ $jobPostingCount }}</h3>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-secondary text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Registered Users</h5>
                            <h3 class="card-text"> {{ $users }} </h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-primary text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Registered Applicants</h5>
                            <h3 class="card-text"> {{ $users }}   </h3>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-info text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Human Resource </h5>
                            <h3 class="card-text"> {{ $users }}   </h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title ">Board Of Management</h5>
                            <h3 class="card-text"> {{ $users }}   </h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('admin.job_postings') }}" class="text-decoration-none">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Admins</h5>
                            <h3 class="card-text"> {{ $users }}   </h3>
                        </div>
                    </div>
                </a>
            </div>
            

            
        </div>

        <!-- Charts and Graphs -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Applicants by Status</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="applicantsStatusChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Job Postings by Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="jobPostingsCategoryChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Applicants by Status Chart
        var ctx = document.getElementById('applicantsStatusChart').getContext('2d');
        var applicantsStatusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Reviewed', 'Interviewed', 'Hired'],
                datasets: [{
                    label: 'Applicants Status',
                    data: [50, 30, 15, 5],
                    backgroundColor: ['#f39c12', '#00c0ef', '#00a65a', '#dd4b39']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var dataset = tooltipItem.dataset;
                                var dataIndex = tooltipItem.dataIndex;
                                var value = dataset.data[dataIndex];
                                var total = dataset.data.reduce((acc, val) => acc + val, 0);
                                var percentage = ((value / total) * 100).toFixed(2);
                                return tooltipItem.label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });

        // Job Postings by Category Chart
        var ctx2 = document.getElementById('jobPostingsCategoryChart').getContext('2d');
        var jobPostingsCategoryChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['IT', 'HR', 'Finance', 'Marketing'],
                datasets: [{
                    data: [10, 5, 4, 6],
                    backgroundColor: ['#007bff', '#00c0ef', '#00a65a', '#dd4b39']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Categories'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Postings'
                        }
                    }
                }
            }
        });
    </script>
@endsection