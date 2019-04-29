<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			@if(!empty($servicioestudiante))
				<a class="navbar-brand" href="{{ URL::to('serviciosestudiantes/' . $servicioestudiante->estudiante->id) }}">Servicios para el estudiante</a>
			@else
				<a class="navbar-brand" href="{{ URL::to('serviciosestudiantes/' . $estudiante->id) }}">Servicios para el estudiante</a>
			@endif
		</div>
		<ul class="nav navbar-nav">
			@if(!empty($servicioestudiante))
				<li><a href="{{ URL::to('serviciosestudiantes/' . $servicioestudiante->estudiante->id) }}">Ver servicios registrados para el estudiante</a></li>
			@else
				<li><a href="{{ URL::to('serviciosestudiantes/' . $estudiante->id) }}">Ver servicios registrados para el estudiante</a></li>
			@endif
			<li><a href="{{ URL::to('estudiantes/create') }}">Registrar estudiante</a>
		</ul>
	</nav>

	<!-- if there are creation errors, they will show here -->
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	<div class="row">
		<div class="col-md-12 form-group">
			{!! Form::label('servicio_id', 'Servicio', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('servicio_id', $servicios, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('valor_sin_descuento', 'Valor sin descuento', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('valor_sin_descuento', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('descuento', 'Descuento') !!}
			<div class="form-controls">
				{!! Form::text('descuento', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('valor_con_descuento', 'Valor con descuento') !!}
			<div class="form-controls">
				{!! Form::text('valor_con_descuento', null, ['class' => 'form-control', 'readonly']) !!}
			</div>
		</div>

		<div class="col-md-6 form-group">
			{!! Form::label('fecha_inicio', 'Fecha inicio', ['class'=>'required']) !!}
			<div class="input-group">
				<div class='input-group-prepend date'>
					<span class="input-group-text">
						<span class="fas fa-fw fa-calendar-alt"></i>
					</span>
				</div>
				{!! Form::text('fecha_inicio', null, ['class' => 'form-control timepicker']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('fecha_fin', 'Fecha fin', ['class'=>'']) !!}
			<div class="input-group">
				<div class="input-group-prepend date">
					<span class="input-group-text">
						<span class="fas fa-fw fa-calendar-alt"></span>
					</span>
				</div>
				{!! Form::text('fecha_fin', null, ['class' => 'form-control timepicker']) !!}
			</div>
		</div>

		<div class="col-md-6 form-group">
			{!! Form::label('hora_inicio', 'Hora inicio', ['class'=>'required']) !!}
			<div class="input-group">
				<div class='input-group-prepend date'>
					<span class="input-group-text">
						<span class="fas fa-fw fa-clock"></span>
					</span>
				</div>
				{!! Form::text('hora_inicio', null, ['class' => 'form-control timepicker']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('hora_fin', 'Hora fin', ['class'=>'required']) !!}
			<div class="input-group">
				<div class="input-group-prepend date">
					<span class="input-group-text">
						<span class="fas fa-fw fa-clock"></span>
					</span>
				</div>
				{!! Form::text('hora_fin', null, ['class' => 'form-control timepicker']) !!}
			</div>
		</div>
		<div class="col-md-12 input-group">
			<legend>Días</legend>

			<div class="col-md-1 form-group"></div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'L', $servicioestudiante->isDiaSeleccionado('L')) !!}
							@else
								{!! Form::checkbox('dias[]', 'L', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Lunes', null, ['class' => 'form-control']) !!}
				</div>
			</div>
			
			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'M', $servicioestudiante->isDiaSeleccionado('M')) !!}
							@else
								{!! Form::checkbox('dias[]', 'M', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Martes', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'Mi', $servicioestudiante->isDiaSeleccionado('Mi')) !!}
							@else
								{!! Form::checkbox('dias[]', 'Mi', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Miércoles', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'J', $servicioestudiante->isDiaSeleccionado('J')) !!}
							@else
								{!! Form::checkbox('dias[]', 'J', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Jueves', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'V', $servicioestudiante->isDiaSeleccionado('V')) !!}
							@else
								{!! Form::checkbox('dias[]', 'V', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Viernes', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-1 form-group"></div>
			
			<div class="col-md-1 form-group"></div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'S', $servicioestudiante->isDiaSeleccionado('S')) !!}
							@else
								{!! Form::checkbox('dias[]', 'S', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Sábado', null, ['class' => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-2 form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							@if(!empty($servicioestudiante))
								{!! Form::checkbox('dias[]', 'D', $servicioestudiante->isDiaSeleccionado('D')) !!}
							@else
								{!! Form::checkbox('dias[]', 'D', false); !!}
							@endif
						</div>
					</div>
					{!! Form::label('Domingo', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

	</div>
</div>

<script type="text/javascript">
	$( "#fecha_inicio" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});

	$( "#fecha_fin" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true
	});
    
	$( "#hora_inicio" ).datetimepicker({
		format: 'LT'
	});

	$( "#hora_fin" ).datetimepicker({
		format: 'LT'
	});
</script>