<!-- Sidebar -->

<div class="sidebar mb-5">
    <!-- Sidebar Menu -->
    <nav class="mt-3    mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link link dashboard-link">
                    <i class="nav-icon fas fa-tachometer-alt fa-2x"></i>
                    <p>Admin Dashboard</p>
                </a>
            </li>

             <!-- User Management -->
             <li class="nav-header">USER MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('admin.user_list') }}" class="nav-link link user-list-link">
                    <i class="nav-icon fas fa-users fa-2x"></i>
                    <p>Registered Users</p>
                </a>
            </li>

           

            <!-- Job Postings -->
            <li class="nav-header">JOB POSTINGS</li>
            <li class="nav-item">
                <a href="{{ route('admin.job_postings') }}" class="nav-link link job-postings-link">
                    <i class="nav-icon fas fa-briefcase fa-2x"></i>
                    <p>Job Postings</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.create_job_posting') }}" class="nav-link link create-job-posting-link">
                    <i class="nav-icon fas fa-plus fa-2x"></i>
                    <p>Create Job Posting</p>
                </a>
            </li>

            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
  <input type="hidden" class="user-view-base" value="profile">
</div>
<!-- /.sidebar -->