<div class="row">
	<div class="col-md-6 form-group">
		{!! Form::label('nombre', 'Nombres') !!}
		<div class="form-controls">
			{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('apellido', 'Apellidos') !!}
		<div class="form-controls">
			{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('tipo_documento_id', 'Tipo de documento') !!}
		<div class="form-controls">
			{!! Form::select('tipo_documento_id', $tiposDocumento, null, ['class' =>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('numero_documento', 'Número de documento') !!}
		<div class="form-controls">
			{!! Form::text('numero_documento', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('edad', 'Edad') !!}
		<div class="form-controls">
			{!! Form::text('edad', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
		<div class="form-controls">
			{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker']) !!}
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('lugar_nacimiento', 'Lugar de nacimiento') !!}
		<div class="form-controls">
			{!! Form::text('lugar_nacimiento', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('colegio_id', 'Colegio') !!}
		<div class="form-controls">
			{!! Form::select('colegio_id', $colegios, null, ['class' =>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('curso', 'Curso') !!}
		<div class="form-controls">
			{!! Form::text('curso', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('eps_id', 'EPS') !!}
		<div class="form-controls">
			{!! Form::select('eps_id', $listEPS, null, ['class' =>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('grupo_sanguineo', 'Grupo sanguíneo') !!}
		<div class="form-controls">
			{!! Form::select('grupo_sanguineo', Artemoc\Enums\GrupoSanguineoEnum::getKeys(), null, ['class' =>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-4 form-group">
		{!! Form::label('factor_rh', 'Factor RH') !!}
		<div class="form-controls">
			{!! Form::select('factor_rh', Artemoc\Enums\RHEnum::getKeys(), null, ['class' =>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('temas_interes', 'Temas de interés') !!}
		<div class="form-controls">
			{!! Form::textarea('temas_interes', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
		</div>
	</div>
	<div class="col-md-6 form-group">
		{!! Form::label('observaciones', 'Observaciones') !!}
		<div class="form-controls">
			{!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 100, 'style' => 'resize:none']) !!}
		</div>
	</div>
	{!! Form::submit('Bienvenid@', ['class' => 'btn btn-primary']) !!}

</div>

<script type="text/javascript">
	$( "#fecha_nacimiento" ).datepicker({
		format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
		todayHighlight: true,
		allowInputToggle: true
	});
</script>