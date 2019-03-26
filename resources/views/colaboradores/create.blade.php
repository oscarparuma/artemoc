@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('/colaboradores') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar colaborador</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'colaboradores']) !!}
	@include('partials.forms.colaborador')
{!! Form::close() !!}
@stop