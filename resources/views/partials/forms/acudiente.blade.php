<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('acudientes') }}">Acudientes</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('acudientes') }}">Ver acudientes registrados</a></li>
			<li><a href="{{ URL::to('acudientes/create') }}">Registrar acudiente</a>
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
		<div class="col-md-6 form-group">
			{!! Form::label('direccion_residencia', 'Dirección residencia', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('direccion_residencia', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('direccion_oficina', 'Dirección oficina', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('direccion_oficina', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('telefono', 'Teléfono', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('celular', 'Celular', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('celular', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('correo_electronico', 'Correo electrónico', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('correo_electronico', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('ocupacion', 'Ocupación', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('ocupacion', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('nivel_escolaridad_id', 'Nivel de escolaridad', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('nivel_escolaridad_id', $nivelesEscolaridad, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		{!! Form::submit('Bienvenid@', ['class' => 'btn btn-primary']) !!}
	</div>
</div>
