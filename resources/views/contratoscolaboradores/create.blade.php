@extends('layouts.master')
@section('header')
	<div>
		<a href="{{ url('/colaboradores') }}">Regresar</a>
	</div>
	<div>
		<h2>Registrar contrato al colaborador</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'contratos/colaborador/' . $colaborador->id]) !!}
	@include('partials.forms.contratocolaborador')
{!! Form::close() !!}
@stop