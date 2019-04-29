@extends('layouts.theme.default')

@section('header')
	<a href="{{ url('serviciosestudiantes/' . $servicioestudiante->estudiante->id) }}">Regresar</a>
	<h2>
		Servicio para {{ $servicioestudiante->estudiante->nombre . ' ' . $servicioestudiante->estudiante->apellido }}
	</h2>
	<a href="{{ url('serviciosestudiantes/'.$servicioestudiante->id.'/edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
		Editar
	</a>
	<a href="{{ url('serviciosestudiantes/'.$servicioestudiante->id.'/inactivate') }}">
		<span class="glyphicon glyphicon-trash"></span>
		Inactivar
	</a>
	<p>&Uacute;ltima actualizaci&oacute;n: {{ $servicioestudiante->updated_at->diffForHumans() }}</p>
@stop

@section('content')
	<p><legend>Servicio</legend> {{ $servicioestudiante->servicio->nombre }}</p>
	<p><legend>Hora inicio</legend> {{ Carbon\Carbon::createFromTimeString($servicioestudiante->hora_inicio)->format('g:i A') }}</p>
	<p><legend>Hora fin</legend> {{ Carbon\Carbon::createFromTimeString($servicioestudiante->hora_fin)->format('g:i A') }}</p>
	<p><legend>Días</legend></p>
	@if ($servicioestudiante->dias != "")
		@foreach(explode(',', $servicioestudiante->dias) as $dia) 
			<div>
				{{ expandWeekdayName($dia) }}
			</div>
		@endforeach
	@endif
@stop