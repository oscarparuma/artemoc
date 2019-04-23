@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('/recaudos') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar recaudo</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'recaudos', 'files'=>'true']) !!}
	@include('partials.forms.recaudo')
{!! Form::close() !!}
@stop