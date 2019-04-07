<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('recaudos') }}">Recaudos</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('recaudos') }}">Ver recaudos</a></li>
			<li><a href="{{ URL::to('recaudos/create') }}">Registrar recaudo</a>
		</ul>
	</nav>

	<h1>Registrar recaudo</h1>

	<!-- if there are creation errors, they will show here -->
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<div class="row">
		<div class="col-md-6 form-group">
			{!! Form::label('estudiante_id', 'Estudiante', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('estudiante_id', collect(['' => 'Seleccione Estudiante'])->concat($estudiantes), $recaudo->servicioestudiante->estudiante->id, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('servicio', 'Servicio', ['class'=>'required']) !!}
			<div class="form-controls">
				@if(isset($servicios))
					{!! Form::select('servicio', $servicios, null, ['class'=>'form-control required']) !!}
				@else
					<select name="servicio" class="form-control">
						<option>--Seleccione Servicio--</option>
					</select>
				@endif
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('mes', 'Mes', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('mes', Artemoc\Enums\MesEnum::toArray(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('estado', 'Estado', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('estado', Artemoc\Enums\EstadoRecaudoEnum::toArray(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('fecha_pago', 'Fecha de pago', ['class'=>'required']) !!}
			<div class='input-group date'>
				{!! Form::text('fecha_pago', null, ['class' => 'form-control timepicker']) !!}
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('forma_pago_id', 'Forma de pago', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('forma_pago_id', $formasPago, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('valor_cancelado', 'Valor cancelado', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('valor_cancelado', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('saldo_por_pagar', 'Saldo por pagar') !!}
			<div class="form-controls">
				{!! Form::text('saldo_por_pagar', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-12 form-group">
			{!! Form::label('ruta_soporte', 'Soporte') !!}
			<div class="form-controls">
				{!! Form::File('ruta_soporte') !!}
			</div>
		</div>

		<div class="col-md-12 form-group">
			{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
		</div>

	</div>
</div>

<script src="{{ asset('js/serviciosEstudiante.js') }}"></script>
<script type="text/javascript">
	$( "#fecha_pago" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});
</script>