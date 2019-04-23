<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('egresos') }}">Egresos</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('egresos') }}">Ver egresos</a></li>
			<li><a href="{{ URL::to('egresos/create') }}">Registrar egreso</a>
		</ul>
	</nav>

	<h1>Registrar egreso</h1>

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
			{!! Form::label('rubro_id', 'Rubro', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('rubro_id', $rubros, null, ['class'=>'form-control required']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('colaborador_id', 'Colaborador', ['class'=>'']) !!}
			<div class="form-controls">
				{!! Form::select('colaborador_id', collect(['' => 'Seleccione Colaborador'])->concat($colaboradores), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('pago_desde', 'Pago desde', ['class'=>'required']) !!}
			<div class='input-group date'>
				{!! Form::text('pago_desde', null, ['class' => 'form-control timepicker']) !!}
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('pago_hasta', 'Pago hasta', ['class'=>'required']) !!}
			<div class='input-group date'>
				{!! Form::text('pago_hasta', null, ['class' => 'form-control timepicker']) !!}
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
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
			{!! Form::label('valor', 'Valor', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('valor', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('forma_pago_id', 'Forma de pago', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('forma_pago_id', $formasPago, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('descripcion', 'Descripción', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
			</div>
		</div>
		<div class="col-md-12 form-group">
			{!! Form::label('observaciones', 'Observaciones', ['class'=>'']) !!}
			<div class="form-controls">
				{!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
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

<script type="text/javascript">
	$( "#pago_desde" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});
	$( "#pago_hasta" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});
	$( "#fecha_pago" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});
</script>