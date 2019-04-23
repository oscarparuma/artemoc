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

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('estudiantes') }}">Ver estudiantes registrados</a></li>
				<li><a href="{{ URL::to('estudiantes/create') }}">Registrar estudiante</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($estudiantes->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Nombre</td>
							<th scope="col">Edad</td>
							<th scope="col">Colegio</td>
							<th scope="col">Curso</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($estudiantes as $estudiante)
						<tr>
							<td>{{ $estudiante->id }}</td>
							<td>{{ $estudiante->nombre . ' ' . $estudiante->apellido }}</td>
							<td>{{ $estudiante->edad }}</td>
							<td>{{ $estudiante->colegio->nombre }}</td>
							<td>{{ $estudiante->curso }}</td>

							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group-vertical">
									<div class="btn-group">
										<!-- show the estudiante (uses the show method found at GET /estudiantes/{id} -->
										<div class="col-md-4 form-controls">
											<a class="btn btn-small btn-warning" href="{{ URL::to('estudiantes/' . $estudiante->id) }}">Ver</a>
										</div>
										
										<!-- edit this estudiante (uses the edit method found at GET /estudiantes/{id}/edit -->
										<div class="col-md-4 form-controls">
											<a class="btn btn-small btn-info" href="{{ URL::to('estudiantes/' . $estudiante->id . '/edit') }}">Editar</a>
										</div>

										<!-- inactivate the estudiante (uses the inactivate method found at PATCH /estudiantes/{id}/inactivate -->
										<div class="col-md-4 form-controls">
											{{ Form::open(array('url' => 'estudiantes/' . $estudiante->id . '/inactivate', 'class' => 'pull-right')) }}
												{{ Form::hidden('_method', 'PATCH') }}
												{{ Form::submit('Inactivar', array('class' => 'btn btn-small btn-danger')) }}
											{{ Form::close() }}
										</div>
									</div>
									<div>&nbsp;</div>
									<div class="btn-group">
										<!-- Asociar un estudiante a uno o más acudientes -->
										<div class="col-md-6 form-controls">
											<a class="btn btn-small btn-primary" href="{{ URL::to('acudientes/estudiante/' . $estudiante->id) }}">Acudientes</a>
										</div>

										<!-- Asociar un estudiante a uno o más servicios -->
										<div class="col-md-6 form-controls">
											<a class="btn btn-small btn-success" href="{{ URL::to('serviciosestudiantes/' . $estudiante->id) }}">Servicios</a>
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
				No hay estudiantes registrados!
			</p>
		@endif
		{{ $estudiantes->links() }}
		<div>
			<a href="{{ url('estudiantes/create') }}" class="btn btn-primary pull-right">Registrar estudiante</a>
		</div>
	</div>
@stop