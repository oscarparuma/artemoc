@extends('layouts.master')

@section('header')
<div>
	<a href="{{ url('/') }}">Regresar</a>
</div>
<div>
	<h2>Recaudos</h2>
</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('recaudos') }}">Ver recaudos</a></li>
				<li><a href="{{ URL::to('recaudos/create') }}">Registrar recaudo</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($recaudos->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Estudiante</td>
							<th scope="col">Servicio</td>
							<th scope="col">Mes</td>
							<th scope="col">Estado</td>
							<th scope="col">Valor cancelado</td>
							<th scope="col">Saldo por pagar</td>
							<th scope="col">Fecha de pago</td>
							<th scope="col">Forma de pago</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($recaudos as $recaudo)
						<tr>
							<td>{{ $recaudo->id }}</td>
							<td>{{ $recaudo->servicioestudiante->estudiante->nombre .' '. $recaudo->servicioestudiante->estudiante->apellido }}</td>
							<td>{{ $recaudo->servicioestudiante->servicio->nombre }}</td>
							<td>{{ Artemoc\Enums\MesEnum::toArray()[$recaudo->mes] }}</td>
							<td>{{ Artemoc\Enums\EstadoRecaudoEnum::toArray()[$recaudo->estado] }}</td>
							<td>{{ $recaudo->valor_cancelado }}</td>
							<td>{{ $recaudo->saldo_por_pagar }}</td>
							<td>{{ Carbon\Carbon::createFromDate($recaudo->fecha)->format('Y-m-d') }}</td>
							<td>{{ $recaudo->forma_pago->nombre }}</td>
							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group">
									<!-- show the recaudo (uses the show method found at GET /recaudos/{recaudo} -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-warning" href="{{ URL::to('recaudos/' . $recaudo->id) }}">Ver</a>
									</div>

									<!-- edit this recaudo (uses the edit method found at GET /recaudos/{recaudo}/edit -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-info" href="{{ URL::to('recaudos/' . $recaudo->id . '/edit') }}">Editar</a>
									</div>
								</div>

							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
            </div>
        @else
			<p>
				No hay recaudos registrados!
			</p>
        @endif
        
        {{ $recaudos->links() }}

		<div>
			<a href="{{ url('recaudos/create') }}" class="btn btn-primary pull-right">Registrar recaudo</a>
		</div>
	</div>
@stop