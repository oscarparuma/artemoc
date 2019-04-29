@extends('layouts.theme.default')
@section('header')
	<div></div>
@stop
@section('content')
{!! Form::open(['url' => 'estudiantes']) !!}
	@include('partials.forms.estudiante')
{!! Form::close() !!}
@stop