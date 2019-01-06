<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Emocionarte - Sistema de administraci&oacute;n</title>
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<!-- Jquery -->
		<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
		<!-- Datepicker Files -->
		<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
		<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
		<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
		<!-- Languaje -->
		<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
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
	</body>
</html>