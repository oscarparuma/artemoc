@extends('layouts.theme.default')
@section('header')
	<div>
		<h2>Registrar acudiente</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'acudientes/estudiante/' . $estudiante->id]) !!}
	@include('partials.forms.acudiente')
{!! Form::close() !!}
@stop