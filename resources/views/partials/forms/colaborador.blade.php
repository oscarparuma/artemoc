<div class="container">

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('colaboradores') }}">Colaboradores</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('colaboradores') }}">Ver colaboradores registrados</a></li>
			<li><a href="{{ URL::to('colaboradores/create') }}">Registrar colaborador</a>
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
		<div class="col-md-4 form-group">
			{!! Form::label('telefono', 'Teléfono', ['class'=>'']) !!}
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
		<div class="col-md-12 form-group">
			{!! Form::label('profesion', 'Profesión', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::text('profesion', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('eps_id', 'EPS', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('eps_id', $listEPS, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('arl_id', 'ARL', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('arl_id', $listARL, null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('grupo_sanguineo', 'Grupo sanguíneo', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('grupo_sanguineo', Artemoc\Enums\GrupoSanguineoEnum::getKeys(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!! Form::label('factor_rh', 'Factor RH', ['class'=>'required']) !!}
			<div class="form-controls">
				{!! Form::select('factor_rh', Artemoc\Enums\RHEnum::getKeys(), null, ['class' =>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-8 form-group">
			{!! Form::label('nombre_contacto_emergencia', 'Nombre contacto emergencia', ['class'=>'required']) !!}
			<div class="input-group date">
				{!! Form::text('nombre_contacto_emergencia', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4 form-group">
			{!! Form::label('telefono_contacto_emergencia', 'Teléfono contacto emergencia', ['class'=>'required']) !!}
			<div class="input-group date">
				{!! Form::text('telefono_contacto_emergencia', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		{!! Form::submit('Bienvenid@', ['class' => 'btn btn-primary']) !!}

	</div>
</div>
