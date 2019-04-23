@extends('layouts.theme.default')
@section('header')
	<h2>Modificar estudiante</h2>
@stop
@section('content')
	{!! Form::model($estudiante, [
			'url' => '/estudiantes/'.$estudiante->id,
			'method' => 'put'
		])
	!!}
		@include('partials.forms.estudiante')
	{!! Form::close() !!}
@stop