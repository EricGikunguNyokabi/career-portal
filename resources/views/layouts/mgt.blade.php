<!-- Sidebar -->
<div class="sidebar mb-5">
    <!-- Sidebar Menu -->
    <nav class="mt-5 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('mgt.dashboard') }}" class="nav-link link dashboard-link">
                    <i class="nav-icon fas fa-tachometer-alt fa-2x"></i>
                    <p>Management Dashboard</p>
                </a>
            </li>
  

            <!-- Applicant Management -->
            <li class="nav-header">APPLICANT MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('mgt.applicant.index') }}" class="nav-link link applicant-list-link">
                    <i class="nav-icon fas fa-users fa-2x"></i>
                    <p>Applicant's List</p>
                </a>
            </li>

            <!-- Job Postings -->
            <li class="nav-header">JOB POSTINGS</li>
            <li class="nav-item">
                <a href="{{ route('mgt.job_postings') }}" class="nav-link link job-postings-link">
                    <i class="nav-icon fas fa-briefcase fa-2x"></i>
                    <p>Job Postings</p>
                </a>
            </li>
          


      
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <input type="hidden" class="user-view-base" value="profile">
</div>
<!-- /.sidebar -->
