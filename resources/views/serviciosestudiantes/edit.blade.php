@extends('layouts.theme.default')
@section('header')
	<h2>Modificar servicio del estudiante {{ $servicioestudiante->estudiante->nombre .' '. $servicioestudiante->estudiante->apellido }}</h2>
@stop
@section('content')
	{!! Form::model($servicioestudiante, [
            'url' => '/serviciosestudiantes/'.$servicioestudiante->id,
		    'method' => 'put'
        ])
    !!}
		@include('partials.forms.servicioestudiante')
	{!! Form::close() !!}
@stop