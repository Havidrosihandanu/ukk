<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="dashboard/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dashboard/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="/perpus.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text a nt-weight-light">SI INPUS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/avatar5.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->full_name }} </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @can('admin')
                        <li class="nav-item active">
                            <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-solid fa-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item ">
                            <a href="/book" class="nav-link {{ Request::is('book') ? 'active' : '' }} ">
                                <i class="nav-icon fa fa-book""></i>
                                <p>Book</p>
                            </a>
                        </li>
                      @can('operator')
                      <li class="nav-item">
                        <a href="#" class="nav-link {{ Request::is('borrow') ? 'active' : '' }} ">
                            <i class="nav-icon fa fa-exchange"></i>
                            <p>
                                Transaction
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="/borrow" class="nav-link {{ Request::is('borrow') ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Borrow Confirmation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                      @endcan
                        <li class="nav-item ">
                            <a href="/report" class="nav-link {{ Request::is('report') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-table "></i>
                                <p>Generate report</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/review" class="nav-link {{ Request::is('review') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-table "></i>
                                <p>Review</p>
                            </a>
                            {{-- <a class="dropdown-item">
                                <form action="/logout" method="POST">
                                  @method('post')
                                  @csrf
                                  <button type="submit" style="border: none;background-color: rgba(255, 255, 255, 0)"><i class="ti-power-off text-primary"></i></button>
                                  Logout
                                    </form>
                                </a> --}}
                        </li>
                        <li class="nav-item ">
                            <form action="/logout" method="POST">
                                @method('post')
                                @csrf
                                <button type="submit"
                                    style="border: none;background-color: rgba(255, 255, 255, 0)"><i
                                        class="ti-power-off text-primary"></i>  Logout</button>
                              
                            </form>
                        </li>
                        {{-- <li class="nav-item ">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @yield('container')
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="dashboard/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="dashboard/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="dashboard/plugins/moment/moment.min.js"></script>
    <script src="dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="dashboard/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dashboard/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dashboard/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dashboard/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & dashboard/Plugins -->
    <script src="dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="dashboard/plugins/jszip/jszip.min.js"></script>
    <script src="dashboard/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="dashboard/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script src="https://kit.fontawesome.com/8d9e037b07.js" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
