<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emocionarte - Sistema de administraci&oacute;n</title>

        <!-- Custom fonts for this template-->
        <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">

        <!-- Jquery -->
		<script src="{{ asset('js/jquery-3.1.0.js') }}"></script>
		<!-- Bootstrap -->
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<!--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">-->

		<script type="text/javascript" src="{{ asset('moment-2.24.0/moment.js') }}"></script>
		<script type="text/javascript" src="{{ asset('bootstrap/js/transition.js') }}"></script>
		<script type="text/javascript" src="{{ asset('bootstrap/js/collapse.js') }}"></script>

		<!-- Datepicker Files -->
		<link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker3.css') }}">
		<link rel="stylesheet" href="{{ asset('datePicker/css/bootstrap-datepicker.standalone.css') }}">
		<script src="{{ asset('datePicker/js/bootstrap-datepicker.js') }}"></script>
		<!-- Bootstrap Datetimepicker Files -->
		<script type="text/javascript" src="{{ asset('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" />
		<!-- Language -->
		<script src="{{ asset('datePicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    </head>

    <body id="page-top">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Page Wrapper -->
        <div id="wrapper">
            @include('layouts.theme.sidebar')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.theme.header')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="page-header">
                            @yield('header')
                        </div>
                        @yield('content')
                    </div>
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                @include('layouts.theme.footer')
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('theme/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('theme/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('theme/js/demo/chart-pie-demo.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
    </body>

</html>