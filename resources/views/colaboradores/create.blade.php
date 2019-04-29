@extends('layouts.theme.default')
@section('header')
	<div>
		<h2>Registrar colaborador</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'colaboradores']) !!}
	@include('partials.forms.colaborador')
{!! Form::close() !!}
@stop