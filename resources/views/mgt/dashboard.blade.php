@extends('layouts.layout')

@section('side_navbar')
    @include('layouts.mgt')
@endsection 

@section('main')
    <div class="container-fluid mt-3">
        <!-- Dashboard Header -->
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 class="text-center">Management Dashboard</h2>
            </div>
        </div>

        <!-- Key Metrics -->
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Applicants</h5>
                        <h3 class="card-text">350</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jobs Posted</h5>
                        <h3 class="card-text">25</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Applications Received</h5>
                        <h3 class="card-text">1200</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Graphs -->
        <div class="row">
            <!-- Applicants by Status -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Applicants by Status</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="applicantsStatusChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Job Postings by Category -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Job Postings by Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="jobPostingsCategoryChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary and Interpretation -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6><strong>Total Applications:</strong></h6>
                                <p>1200</p>
                            </div>
                            <div class="col-md-6">
                                <h6><strong>Total Job Postings:</strong></h6>
                                <p>25</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><strong>Applicants by Status:</strong></h6>
                                <p>Pending: 50%</p>
                                <p>Reviewed: 30%</p>
                                <p>Interviewed: 15%</p>
                                <p>Hired: 5%</p>
                            </div>
                            <div class="col-md-6">
                                <h6><strong>Job Postings by Category:</strong></h6>
                                <p>IT: 10</p>
                                <p>HR: 5</p>
                                <p>Finance: 4</p>
                                <p>Marketing: 6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Interpretation</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Applicants by Status:</strong> The majority of applicants are currently in the 'Pending' stage. This may indicate that the review process is still ongoing or that more applicants need to be reviewed.</p>
                        <p><strong>Job Postings by Category:</strong> The highest number of job postings is in the IT category. This suggests a focus on technology-related positions, which may align with current hiring needs or trends in the organization.</p>
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
                    // label: 'Job Postings by Category',
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
