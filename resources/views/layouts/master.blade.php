<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Emocionarte - Sistema de administraci&oacute;n</title>
		
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
		<!-- Custom styles -->
		<link href="{{ asset('css/artemoc.css') }}" rel="stylesheet" type="text/css" />

		<!-- Jquery -->
		<script src="{{ asset('js/jquery-3.1.0.js') }}"></script>
		<!-- Bootstrap -->
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

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
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
			</div>
			@if (Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
			@yield('content')
		</div>
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