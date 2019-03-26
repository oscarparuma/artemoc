@extends('layouts.master')

@section('header')
<div>
	<a href="{{ url('/') }}">Regresar</a>
</div>
<div>
	<h2>Colaboradores</h2>
</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('colaboradores') }}">Ver colaboradores registrados</a></li>
				<li><a href="{{ URL::to('colaboradores/create') }}">Registrar colaborador</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($colaboradores->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Nombre</td>
							<th scope="col">Celular</td>
							<th scope="col">Profesión</td>
							<th scope="col">EPS</td>
							<th scope="col">ARL</td>
							<th scope="col">Nombre contacto emergencia</td>
							<th scope="col">Teléfono contacto emergencia</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($colaboradores as $colaborador)
						<tr>
							<td>{{ $colaborador->id }}</td>
							<td>{{ $colaborador->nombre . ' ' . $colaborador->apellido }}</td>
							<td>{{ $colaborador->celular }}</td>
							<td>{{ $colaborador->profesion }}</td>
							<td>{{ $colaborador->eps->nombre }}</td>
							<td>{{ $colaborador->arl->nombre }}</td>
							<td>{{ $colaborador->nombre_contacto_emergencia }}</td>
							<td>{{ $colaborador->telefono_contacto_emergencia }}</td>

							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group-vertical">
									<div class="btn-group">
										<!-- show the colaborador (uses the show method found at GET /colaboradores/{id} -->
										<div class="col-md-4 form-controls">
											<a class="btn btn-small btn-warning" href="{{ URL::to('colaboradores/' . $colaborador->id) }}">Ver</a>
										</div>
										
										<!-- edit this colaborador (uses the edit method found at GET /colaboradores/{id}/edit -->
										<div class="col-md-4 form-controls">
											<a class="btn btn-small btn-info" href="{{ URL::to('colaboradores/' . $colaborador->id . '/edit') }}">Editar</a>
										</div>

										<!-- inactivate the colaborador (uses the inactivate method found at PATCH /colaboradores/{id}/inactivate -->
										<div class="col-md-4 form-controls">
											{{ Form::open(array('url' => 'colaboradores/' . $colaborador->id . '/inactivate', 'class' => 'pull-right')) }}
												{{ Form::hidden('_method', 'PATCH') }}
												{{ Form::submit('Inactivar', array('class' => 'btn btn-small btn-danger')) }}
											{{ Form::close() }}
										</div>
									</div>
									<div>&nbsp;</div>
									<div class="btn-group">
										<!-- Asociar un colaborador a uno o más contratos -->
										<div class="col-md-6 form-controls">
											<a class="btn btn-small btn-primary" href="{{ URL::to('contratos/colaborador/' . $colaborador->id) }}">Contratos</a>
										</div>
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
				No hay colaboradores registrados!
			</p>
		@endif
		{{ $colaboradores->links() }}
		<div>
			<a href="{{ url('colaboradores/create') }}" class="btn btn-primary pull-right">Registrar colaborador</a>
		</div>
	</div>
@stop