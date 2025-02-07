<!-- resources/views/applicant/sidebar.blade.php -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('applicant.dashboard') }}" class="nav-link link dashboard-link">
                        <i class="nav-icon fas fa-tachometer-alt fa-2x"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MY PROFILE</li>
                <li class="nav-item">
                    <a href="{{ route('applicant.personal_profile') }}" class="nav-link link overview-link">
                        <i class="far fa-user-circle fa-2x nav-icon"></i>
                        <p>Personal Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.education_profile') }}" class="nav-link link education-link">
                        <i class="far fa-graduation-cap nav-icon"></i>
                        <p>Education</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.other_trainings') }}" class="nav-link link training-link">
                        <i class="far fa-chalkboard-teacher nav-icon"></i>
                        <p>Other Trainings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('applicant.employment_profile') }}" class="nav-link link employment-link">
                        <i class="far fa-building nav-icon"></i>
                        <p>Employment History</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.referees') }}" class="nav-link link referee-link">
                        <i class="far fa-users nav-icon"></i>
                        <p>Referees</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.files_upload') }}" class="nav-link link files-link">
                        <i class="far fa-file-pdf nav-icon"></i>
                        <p>Files Uploads</p>
                    </a>
                </li>

                <li class="nav-header">JOBS</li>
                <li class="nav-item">
                    <a href="{{ route('applicant.application_history') }}" class="nav-link link my-applications-link">
                        <i class="nav-icon far fa-file-user fa-2x"></i>
                        <p>Application History</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applicant.job_posting') }}" class="nav-link link advertised-jobs-link">
                        <i class="nav-icon far fa-file-alt fa-2x"></i>
                        <p>Advertised Jobs</p>
                    </a>
                </li>
                <li class="nav-item d-none">
                    <a href="#">
                        <i class="nav-icon far fa-file-alt fa-2x"></i>
                        <p>My Saved Jobs</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <input type="hidden" class="user-view-base" value="profile">
    </div>
    <!-- /.sidebar -->

