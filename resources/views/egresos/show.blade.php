@extends('layouts.theme.default')

@section('header')
	<h2>
		Recaudos
	</h2>
	<a href="{{ url('egresos/'. $egreso->id .'/edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
		Editar
	</a>
	<p>&Uacute;ltima actualizaci&oacute;n: {{ $egreso->updated_at->diffForHumans() }}</p>
@stop

@section('content')
	<p><legend>Rubro</legend> {{ $egreso->rubro->nombre }}</p>
	@if($egreso->colaborador)
		<p><legend>Colaborador</legend> {{ $egreso->colaborador->nombre .' '. $egreso->colaborador->apellido }}</p>
	@endif
	<p><legend>Valor</legend> {{ $egreso->valor }}</p>
	<p><legend>Pago desde</legend> {{ $egreso->pago_desde }} </p>
	<p><legend>Pago hasta</legend> {{ $egreso->pago_hasta }} </p>
	<p><legend>Fecha de pago</legend> {{ $egreso->fecha_pago }} </p>
	<p><legend>Forma de pago</legend> {{ $egreso->forma_pago->nombre }} </p>
	<p><legend>Descripción</legend> {{ $egreso->descripcion }}</p>
	<p><legend>Observaciones</legend> {{ $egreso->observaciones }}</p>
	<p><legend>Soporte</legend> {{ $egreso->ruta_soporte }} </p>
@stop