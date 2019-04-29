@extends('layouts.theme.default')
@section('header')
	<h2>Modificar acudiente</h2>
@stop
@section('content')
	{!! Form::model($acudiente, [
			'url' => '/acudientes/'.$acudiente->id,
			'method' => 'put'
		])
	!!}
		@include('partials.forms.acudiente')
	{!! Form::close() !!}
@stop