@extends('layouts.master')

@section('header')
	<a href="{{ url('/') }}">Regresar</a>
	<h2>
		{{ $estudiante->nombre }}
	</h2>
	<a href="{{ url('estudiantes/'.$estudiante->id.'/edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
		Editar
	</a>
	<a href="{{ url('estudiantes/'.$estudiante->id.'/inactivate') }}">
		<span class="glyphicon glyphicon-trash"></span>
		Inactivar
	</a>
	<p>&Uacute;ltima actualizaci&oacute;n: {{ $estudiante->updated_at->diffForHumans() }}</p>
@stop

@section('content')
	<p>Nombres: {{ $estudiante->nombre }}</p>
	<p>Apellidos: {{ $estudiante->apellido }}</p>
	<p>
		@if ($estudiante->colegio)
			Colegio:
			{{ link_to('estudiantes/colegios/'.$estudiante->colegio->nombre, $estudiante->colegio->nombre)}}
		@endif
	</p>
@stop