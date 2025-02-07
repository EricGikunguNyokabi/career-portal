<!-- Sidebar -->
<div class="sidebar mb-5">
    <!-- Sidebar Menu -->
    <nav class="mt-5 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('hr.dashboard') }}" class="nav-link link dashboard-link">
                    <i class="nav-icon fas fa-tachometer-alt fa-2x"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Applicant Management -->
            <li class="nav-header">APPLICANT MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('hr.applicant_list') }}" class="nav-link link applicant-list-link">
                    <i class="nav-icon fas fa-users fa-2x"></i>
                    <p>Applicant List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.view_applicant', ['id' => 1]) }}" class="nav-link link view-applicant-link">
                    <i class="nav-icon fas fa-user fa-2x"></i>
                    <p>View Applicant</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.filter_applicants') }}" class="nav-link link filter-applicants-link">
                    <i class="nav-icon fas fa-filter fa-2x"></i>
                    <p>Filter Applicants</p>
                </a>
            </li>

            <!-- Job Postings -->
            <li class="nav-header">JOB POSTINGS</li>
            <li class="nav-item">
                <a href="{{ route('hr.job_postings') }}" class="nav-link link job-postings-link">
                    <i class="nav-icon fas fa-briefcase fa-2x"></i>
                    <p>Job Postings</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.create_job_posting') }}" class="nav-link link create-job-posting-link">
                    <i class="nav-icon fas fa-plus fa-2x"></i>
                    <p>Create Job Posting</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.edit_job_posting', ['id' => 1]) }}" class="nav-link link edit-job-posting-link">
                    <i class="nav-icon fas fa-edit fa-2x"></i>
                    <p>Edit Job Posting</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.delete_job_posting', ['id' => 1]) }}" class="nav-link link delete-job-posting-link">
                    <i class="nav-icon fas fa-trash fa-2x"></i>
                    <p>Delete Job Posting</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.filter_job_postings') }}" class="nav-link link filter-job-postings-link">
                    <i class="nav-icon fas fa-filter fa-2x"></i>
                    <p>Filter Job Postings</p>
                </a>
            </li>

            <!-- Application Management -->
            <li class="nav-header">APPLICATION MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('hr.view_applications') }}" class="nav-link link view-applications-link">
                    <i class="nav-icon fas fa-file-alt fa-2x"></i>
                    <p>View Applications</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.view_application', ['id' => 1]) }}" class="nav-link link view-application-link">
                    <i class="nav-icon fas fa-file fa-2x"></i>
                    <p>View Application</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.update_application_status', ['id' => 1]) }}" class="nav-link link update-application-status-link">
                    <i class="nav-icon fas fa-sync fa-2x"></i>
                    <p>Update Application Status</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.delete_application', ['id' => 1]) }}" class="nav-link link delete-application-link">
                    <i class="nav-icon fas fa-trash-alt fa-2x"></i>
                    <p>Delete Application</p>
                </a>
            </li>

            <!-- Interview Scheduling -->
            <li class="nav-header">INTERVIEW SCHEDULING</li>
            <li class="nav-item">
                <a href="{{ route('hr.interviews') }}" class="nav-link link interviews-link">
                    <i class="nav-icon fas fa-calendar-alt fa-2x"></i>
                    <p>View Interviews</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.schedule_interview') }}" class="nav-link link schedule-interview-link">
                    <i class="nav-icon fas fa-calendar-plus fa-2x"></i>
                    <p>Schedule Interview</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.reschedule_interview', ['id' => 1]) }}" class="nav-link link reschedule-interview-link">
                    <i class="nav-icon fas fa-calendar-times fa-2x"></i>
                    <p>Reschedule Interview</p>
                </a>
            </li>

            <!-- Document Management -->
            <li class="nav-header">DOCUMENT MANAGEMENT</li>
            <li class="nav-item">
                <a href="{{ route('hr.documents') }}" class="nav-link link documents-link">
                    <i class="nav-icon fas fa-folder fa-2x"></i>
                    <p>View Documents</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.upload_documents') }}" class="nav-link link upload-documents-link">
                    <i class="nav-icon fas fa-upload fa-2x"></i>
                    <p>Upload Documents</p>
                </a>
            </li>

            <!-- Reports & Analytics -->
            <li class="nav-header">REPORTS & ANALYTICS</li>
            <li class="nav-item">
                <a href="{{ route('hr.reports') }}" class="nav-link link reports-link">
                    <i class="nav-icon fas fa-chart-line fa-2x"></i>
                    <p>Reports</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('hr.analytics') }}" class="nav-link link analytics-link">
                    <i class="nav-icon fas fa-chart-pie fa-2x"></i>
                    <p>Analytics</p>
                </a>
            </li>

            <!-- Notifications -->
            <li class="nav-header">NOTIFICATIONS</li>
            <li class="nav-item">
                <a href="{{ route('hr.notifications') }}" class="nav-link link notifications-link">
                    <i class="nav-icon fas fa-bell fa-2x"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <input type="hidden" class="user-view-base" value="profile">
</div>
<!-- /.sidebar -->
