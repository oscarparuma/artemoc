<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('estudiantes') }}">Estudiantes</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('estudiantes') }}">Ver estudiantes registrados</a></li>
			<li><a href="{{ URL::to('estudiantes/create') }}">Registrar estudiante</a>
		</ul>
	</nav>

	<h1>Registrar estudiante</h1>

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
			{!! Form::label('nombre', 'Nombres', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('apellido', 'Apellidos', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('tipo_documento_id', 'Tipo de documento', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('tipo_documento_id', $tiposDocumento, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('numero_documento', 'Número de documento', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('numero_documento', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-3 form-group">
			{!! Form::label('edad', 'Edad', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('edad', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-3 form-group">
			{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento', ['class'=>'required']) !!}
			<div class="input-group date">
				{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker']) !!}
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="col-md-3 form-group">
			{!! Form::label('departamento', 'Departamento', ['class'=>'required']) !!}
			<div class="form-controls">
				<select name="departamento" class="form-control">
					<option value="">--Seleccione Departamento--</option>
					@foreach ($departamentos as $departamento => $value)
						<option value="{{ $departamento }}"> {{ $value }}</option>   
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-3 form-group">
			{!! Form::label('municipio', 'Municipio', ['class'=>'required']) !!}
			<div class="form-controls">
				<select name="municipio" class="form-control">
					<option>--Seleccione Municipio--</option>
				</select>
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('colegio_id', 'Colegio', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('colegio_id', $colegios, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('curso', 'Curso', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('curso', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('eps_id', 'EPS', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('eps_id', $listEPS, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('grupo_sanguineo', 'Grupo sanguíneo', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('grupo_sanguineo', Artemoc\Enums\GrupoSanguineoEnum::getKeys(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('factor_rh', 'Factor RH', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('factor_rh', Artemoc\Enums\RHEnum::getKeys(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('temas_interes', 'Temas de interés', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::textarea('temas_interes', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('observaciones', 'Observaciones', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
			</div>
		</div>
		{!! Form::submit('Bienvenid@', ['class' => 'btn btn-primary']) !!}

	</div>
</div>

<script src="{{ asset('js/departamentoMunicipio.js') }}"></script>
<script type="text/javascript">
	$( "#fecha_nacimiento" ).datepicker({
		format: "yyyy-mm-dd",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true
	});
</script>
