@extends('layouts.theme.default')

@section('header')
	<div>
		<h2>Contratos para {{ $colaborador->nombre . ' ' . $colaborador->apellido }}</h2>
	</div>
@stop
@section('content')

	<div class="container">

		<nav class="navbar navbar-inverse">
			<div class="navbar-header"></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('colaboradores') }}">Ver colaboradores registrados</a></li>
				<li><a href="{{ URL::to('contratos/colaborador/' . $colaborador->id . '/create') }}">Registrar contrato al colaborador</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		@if ($contratoscolaboradores->count() > 0)
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
					@foreach ($contratoscolaboradores as $contratocolaborador)
						<tr>
							<td>{{ $contratocolaborador->id }}</td>
							<td>{{ $contratocolaborador->servicio->nombre }}</td>
							<td>{{ Carbon\Carbon::createFromTimeString($contratocolaborador->hora_inicio)->format('g:i A') . ' - ' . Carbon\Carbon::createFromTimeString($contratocolaborador->hora_fin)->format('g:i A') }}</td>
							<td>
							@if ($contratocolaborador->dias != "")
								@foreach(explode(',', $contratocolaborador->dias) as $dia) 
									<div>
										{{ expandWeekdayName($dia) }}
									</div>
								@endforeach
							@endif
							</td>
							<!-- we will also add show, edit, and delete buttons -->
							<td class="col-md-4 form-group">

								<div class="btn-group">
									<!-- show the contratocolaborador (uses the show method found at GET /contratos/colaborador/{id} -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-warning" href="{{ URL::to('contratos/colaborador/' . $contratocolaborador->id) }}">Ver</a>
									</div>

									<!-- edit this contratocolaborador (uses the edit method found at GET /contratos/colaborador/{id}/edit -->
									<div class="col-md-4 form-controls">
										<a class="btn btn-small btn-info" href="{{ URL::to('contratos/colaborador/' . $contratocolaborador->id . '/edit') }}">Editar</a>
									</div>

									<!-- inactivate the contratocolaborador (uses the inactivate method found at PATCH /contratos/colaborador/{id}/inactivate -->
									<div class="col-md-4 form-controls">
										{{ Form::open(array('url' => 'contratos/colaborador/' . $contratocolaborador->id . '/inactivate', 'class' => 'pull-right')) }}
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
				El colaborador no tiene contratos registrados!
			</p>
        @endif
        
        {{ $contratoscolaboradores->links() }}

		<div>
			<a href="{{ url('contratos/colaborador/' . $colaborador->id . '/create') }}" class="btn btn-primary pull-right">Registrar contrato al colaborador</a>
		</div>
	</div>
@stop