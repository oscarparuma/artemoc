@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('estudiantes') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar acudiente</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'acudientes/estudiante/' . $estudiante->id]) !!}
	@include('partials.forms.acudiente')
{!! Form::close() !!}
@stop