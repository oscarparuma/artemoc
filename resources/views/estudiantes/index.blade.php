@extends('layouts.master')

@section('header')
<div>
	<a href="{{ url('/') }}">Regresar</a>
</div>
<div>
	<h2>Estudiantes</h2>
</div>
@stop
@section('content')
	@if ($estudiantes->count() > 0)
		@foreach ($estudiantes as $estudiante)
			<div class="estudiante">
				<a href="{{ url('estudiantes/'.$estudiante->id) }}">
					<strong>{{ $estudiante->nombre }}</strong> - {{ $estudiante->colegio->nombre }}
				</a>
			</div>
		@endforeach
	@else
		<p>
			No hay estudiantes registrados!
		</p>
	@endif
	<div>
		<a href="{{ url('estudiantes/create') }}" class="btn btn-primary pull-right">Registrar estudiante</a>
	</div>
@stop