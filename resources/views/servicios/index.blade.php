@extends('layouts.theme.default')

@section('header')
	<div>
		<h2>Servicios</h2>
	</div>
@stop
@section('content')
	@if ($servicios->count() > 0)
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Tipo</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($servicios as $servicio)
					<tr>
						<td>{{$servicio->nombre}}</td>
						<td>{{$servicio->tipo == 'N' ? 'Normal' : 'Adicional'}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<p>
			No hay servicios registrados!
		</p>
	@endif
	<div>
		<a href="{{ url('servicios/create') }}" class="btn btn-primary pull-right">Registrar servicio</a>
	</div>
@stop