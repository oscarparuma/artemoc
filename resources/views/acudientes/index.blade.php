@extends('layouts.master')

@section('header')
<div>
	<a href="{{ url('/') }}">Regresar</a>
</div>
<div>
	<h2>Acudientes</h2>
</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('acudientes') }}">Ver acudientes registrados</a></li>
				<li><a href="{{ URL::to('acudientes/create') }}">Registrar acudiente</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($acudientes->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Nombre</td>
							<th scope="col">Número documento</td>
							<th scope="col">Dirección residencia</td>
							<th scope="col">Dirección oficina</td>
							<th scope="col">Teléfono</td>
							<th scope="col">Celular</td>
							<th scope="col">Correo electrónico</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($acudientes as $acudiente)
						<tr>
							<td>{{ $acudiente->id }}</td>
							<td>{{ $acudiente->nombre . ' ' . $acudiente->apellido }}</td>
							<td>{{ $acudiente->numero_documento }}</td>
							<td>{{ $acudiente->direccion_residencia }}</td>
							<td>{{ $acudiente->direccion_oficina }}</td>
							<td>{{ $acudiente->telefono }}</td>
							<td>{{ $acudiente->celular }}</td>
							<td>{{ $acudiente->correo_electronico }}</td>

							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group">
									<!-- show the acudiente (uses the show method found at GET /acudientes/{id} -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-warning" href="{{ URL::to('acudientes/' . $acudiente->id) }}">Ver</a>
									</div>

									<!-- edit this acudiente (uses the edit method found at GET /acudientes/{id}/edit -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-info" href="{{ URL::to('acudientes/' . $acudiente->id . '/edit') }}">Editar</a>
									</div>

									<!-- inactivate the acudiente (uses the inactivate method found at PATCH /acudientes/{id}/inactivate -->
									<div class="col-md-4 form-controls">
										{{ Form::open(array('url' => 'acudientes/' . $acudiente->id . '/inactivate', 'class' => 'pull-right')) }}
											{{ Form::hidden('_method', 'PATCH') }}
											{{ Form::submit('Inactivar', array('class' => 'btn btn-small btn-danger')) }}
										{{ Form::close() }}
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
				No hay acudientes registrados!
			</p>
		@endif
		{{ $acudientes->links() }}
	</div>
@stop