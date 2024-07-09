<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | MyPuskesmas </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('doctor.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('doctor.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">MyPuskesmas by <a
                                href="https://github.com/anwarajijuloh" target="_blank">Anwar Ajijuloh</a>
                            from universitas teknologi bandung.</span>
                        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2024. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- custom script --}}
    @yield('scripts')
    <!-- plugins:js -->
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets') }}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>
