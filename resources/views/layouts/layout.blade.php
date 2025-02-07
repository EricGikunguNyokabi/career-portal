<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vtech Recruiters, Jobs Portal.">
    <title id="page-title">
        @yield('title') {{ $company_name ?? 'VTECH RECRUITERS' }}
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/findjob.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0-rc/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

    <!-- Local Assets -->
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">

    <style>
        * {
            font-family: monospace;
            font-size: 1.5dvh;
        }
       
        .sidebar {
            height: 100%;
            overflow-y: auto;
            background-color: #f8f9fa;
            width: auto;
            flex: 0 1 auto;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    

 <!-- Navbar -->
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light mr-3 text-sm" style="opacity:1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
                </li>
            </ul>
            <!-- Top Navigationbar -->
            @if (Auth::check())
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-success">
                        <i class="far fa-user-circle"></i>
                        <span class="font-weight-bold">
                            <span>Welcome {{ Auth::user()->name ?? '' }}</span>
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown mr-3 ml-3 navbar-notifications"></li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger logout btn-sm rounded-pill"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="far fa-power-off font-weight-bold"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            @else
                <!-- <span>Guest</span> -->
            @endif
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar elevation-4 sidebar-light-dark">
            <a href="{{route('home') }}" class="brand-link text-sm">
                <img src="{{ asset('images/findjob.png') }}" alt="Vtech Recruiters Logo"
                    class="brand-image img-circle elevation-1" style="opacity: 1">
                <span class="brand-text font-weight-bold"> {{ $company_name ?? 'VTECH RECRUITMENT PORTAL' }}</span>
            </a>

            @yield('side_navbar')
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
                    @if (Auth::check())
                        <li class="nav-item">
                            @if (Auth::user()->role === 'admin') <!-- Check if user is admin -->
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="fas fa-tachometer-alt fa-2x nav-icon"></i>
                                    <p>Admin Dashboard</p>
                                </a>
                            @elseif (Auth::user()->role === 'hr') <!-- Check if user is hr -->
                                <a href="{{ route('hr.dashboard') }}" class="nav-link">
                                    <i class="fas fa-tachometer-alt fa-2x nav-icon"></i>
                                    <p>HR Dashboard</p>
                                </a>
                            @elseif (Auth::user()->role === 'management') <!-- Check if user is management -->
                                <a href="{{ route('management.dashboard') }}" class="nav-link">
                                    <i class="fas fa-tachometer-alt fa-2x nav-icon"></i>
                                    <p>Management Dashboard</p>
                                </a>
                            @elseif (Auth::user()->role === 'applicant') <!-- Check if user is applicant -->
                                <a href="{{ route('applicant.dashboard') }}" class="nav-link">
                                    <i class="fas fa-tachometer-alt fa-2x nav-icon"></i>
                                    <p>Applicant Dashboard</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item mt-5 py-5">
                            <a id="logout-form"  href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user fa-2x nav-icon"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>



                    @else
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link link log-in-link mt-2">
                                <i class="fas fa-home fa-2x nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link link log-in-link mt-2">
                                <i class="fas fa-sign-in-alt fa-2x nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link link register-link">
                                <i class="far fa-user-plus fa-2x nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                    @endif
                    </ul>
                </nav>
            </div>
            @yield('side_navbar')
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid" id="dynamic-content" style="width: auto; padding: 0 0 0 0;">
                    <style>
                        .container{ margin-left: auto; margin-right: auto; }
                    </style>
                    <!-- main content page -->
                    <div class="container-fluid mt-5 mb-5">
                    @yield('main')
                    </div>
                </div>
            </section>
        </div>

        @yield('footer')

        <footer class="main-footer text-sm" style="opacity:1">
            &copy; 2024: Developed by <a href="https://github.com/EricGikunguNyokabi" target="_blank">E.G.N</a>
            <div class="float-right d-sm-inline-block">
                <a href="https://wa.me/254701838170" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp Us</a>
            </div>
        </footer>
    
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0-rc/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/datatables.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     // Initialize DataTables
        //     $('#your-table-id').DataTable();
        // });
    </script>
</body>

</html>