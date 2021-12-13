<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cinema Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets-admin')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('assets-admin')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{url('assets-admin')}}/fonts/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="{{url('assets-admin')}}/js/dataTables.bootstrap4.js">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets-admin')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('assets-admin')}}/images/favicon.ico" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('back-end.layout.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('back-end.layout.menu') @yield('Main_Admin')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- <script src="{{url('assets-admin')}}/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="{{url('assets-admin')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{url('assets-admin')}}/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('assets-admin')}}/js/off-canvas.js"></script>
    <script src="{{url('assets-admin')}}/js/hoverable-collapse.js"></script>
    <script src="{{url('assets-admin')}}/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{url('assets-admin')}}/js/chart.js"></script>
    <script src="{{ url('assets-admin') }}/ckeditor/ckeditor.js"></script>
    @yield('script')
    <!-- End custom js for this page -->
</body>

</html>