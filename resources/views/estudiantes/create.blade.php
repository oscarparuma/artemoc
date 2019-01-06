@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('/estudiantes') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar estudiante</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => '/estudiantes']) !!}
	@include('partials.forms.estudiante')
{!! Form::close() !!}
@stop