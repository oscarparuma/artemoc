@extends('layouts.theme.default')

@section('header')
	<div>
		<h2>Egresos</h2>
	</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('egresos') }}">Ver egresos</a></li>
				<li><a href="{{ URL::to('egresos/create') }}">Registrar egreso</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($egresos->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Rubro</td>
							<th scope="col">Colaborador</td>
							<th scope="col">Pago desde</td>
							<th scope="col">Pago hasta</td>
							<th scope="col">Fecha de pago</td>
							<th scope="col">Valor</td>
							<th scope="col">Forma de pago</td>
							<th scope="col">Descripción</td>
							<th scope="col">Observaciones</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($egresos as $egreso)
						<tr>
							<td>{{ $egreso->id }}</td>
							<td>{{ $egreso->rubro->nombre }}</td>
							<td>
								@if(isset($egreso->colaborador))
									{{ $egreso->colaborador->nombre .' '. $egreso->colaborador->apellido }}
								@endif
							</td>
							<td>{{ $egreso->pago_desde }}</td>
							<td>{{ $egreso->pago_hasta }}</td>
							<td>{{ $egreso->fecha_pago }}</td>
							<td>{{ $egreso->valor }}</td>
							<td>{{ $egreso->forma_pago->nombre }}</td>
							<td>{{ $egreso->descripcion }}</td>
							<td>{{ $egreso->observaciones }}</td>
							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group">
									<!-- show the egreso (uses the show method found at GET /egresos/{egreso} -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-warning" href="{{ URL::to('egresos/' . $egreso->id) }}">Ver</a>
									</div>

									<!-- edit this egreso (uses the edit method found at GET /egresos/{egreso}/edit -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-info" href="{{ URL::to('egresos/' . $egreso->id . '/edit') }}">Editar</a>
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
				No hay egresos registrados!
			</p>
        @endif
        
        {{ $egresos->links() }}
		<div class="col-md-12 form-group">&nbsp;</div>
		<div>
			<a href="{{ url('egresos/create') }}" class="btn btn-primary pull-right">Registrar egreso</a>
		</div>
	</div>
@stop