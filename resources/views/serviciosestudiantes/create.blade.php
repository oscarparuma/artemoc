@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('/serviciosestudiantes') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar servicios al estudiante</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'serviciosestudiantes/' . $estudiante->id]) !!}
	@include('partials.forms.servicioestudiante')
{!! Form::close() !!}
@stop