@extends('layouts.master')

@section('header')
<div>
	<a href="{{ url('/') }}">Regresar</a>
</div>
<div>
	<h2>Servicios para {{ $estudiante->nombre . ' ' . $estudiante->apellido }}</h2>
</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('estudiantes') }}">Ver estudiantes registrados</a></li>
				<li><a href="{{ URL::to('serviciosestudiantes/' . $estudiante->id . '/create') }}">Registrar servicio al estudiante</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($serviciosestudiantes->count() > 0)
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</td>
							<th scope="col">Servicio</td>
							<th scope="col">Horario</td>
							<th scope="col">Días</td>
							<th scope="col">Acciones</td>
						</tr>
					</thead>
					<tbody>
					@foreach ($serviciosestudiantes as $servicioestudiante)
						<tr>
							<td>{{ $servicioestudiante->id }}</td>
							<td>{{ $servicioestudiante->servicio->nombre }}</td>
							<td>{{ Carbon\Carbon::createFromTimeString($servicioestudiante->hora_inicio)->format('g:i A') . ' - ' . Carbon\Carbon::createFromTimeString($servicioestudiante->hora_fin)->format('g:i A') }}</td>
							<td>
							@if ($servicioestudiante->dias != "")
								@foreach(explode(',', $servicioestudiante->dias) as $dia) 
									<div>
										{{ expandWeekdayName($dia) }}
									</div>
								@endforeach
							@endif
							</td>
							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group">
									<!-- show the servicioestudiante (uses the show method found at GET /serviciosestudiantes/{id} -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-warning" href="{{ URL::to('serviciosestudiantes/servicio/' . $servicioestudiante->id) }}">Ver</a>
									</div>

									<!-- edit this servicioestudiante (uses the edit method found at GET /serviciosestudiantes/{id}/edit -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-info" href="{{ URL::to('serviciosestudiantes/' . $servicioestudiante->id . '/edit') }}">Editar</a>
									</div>

									<!-- inactivate the servicioestudiante (uses the inactivate method found at PATCH /serviciosestudiantes/{id}/inactivate -->
									<div class="col-md-4 form-controls">
										{{ Form::open(array('url' => 'serviciosestudiantes/' . $servicioestudiante->id . '/inactivate', 'class' => 'pull-right')) }}
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
				El estudiante no tiene servicios registrados!
			</p>
        @endif
        
        {{ $serviciosestudiantes->links() }}

		<div>
			<a href="{{ url('serviciosestudiantes/' . $estudiante->id . '/create') }}" class="btn btn-primary pull-right">Registrar servicio al estudiante</a>
		</div>
	</div>
@stop