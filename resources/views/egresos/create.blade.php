@extends('layouts.theme.default')
@section('header')
	<div>
		<h2>Registrar egreso</h2>
	</div>
@stop
@section('content')
{!! Form::open(['url' => 'egresos', 'files'=>'true']) !!}
	@include('partials.forms.egreso')
{!! Form::close() !!}
@stop