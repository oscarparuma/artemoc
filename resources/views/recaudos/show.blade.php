@extends('layouts.master')

@section('header')
	<a href="{{ url('/recaudos') }}">Regresar</a>
	<h2>
		Recaudos
	</h2>
	<a href="{{ url('recaudos/'. $recaudo->id .'/edit') }}">
		<span class="glyphicon glyphicon-edit"></span>
		Editar
	</a>
	<p>&Uacute;ltima actualizaci&oacute;n: {{ $recaudo->updated_at->diffForHumans() }}</p>
@stop

@section('content')
	<p><legend>Estudiante</legend> {{ $recaudo->servicioestudiante->estudiante->nombre .' '. $recaudo->servicioestudiante->estudiante->apellido }}</p>
	<p><legend>Servicio</legend> {{ $recaudo->servicioestudiante->servicio->nombre }}</p>
	<p><legend>Mes</legend> {{ Artemoc\Enums\MesEnum::toArray()[$recaudo->mes] }}</p>
	<p><legend>Estado</legend> {{ Artemoc\Enums\EstadoRecaudoEnum::toArray()[$recaudo->estado] }}</p>
	<p><legend>Valor cancelado</legend> {{ $recaudo->valor_cancelado }} </p>
	<p><legend>Saldo por pagar</legend> {{ $recaudo->saldo_por_pagar }} </p>
	<p><legend>Fecha de pago</legend> {{ Carbon\Carbon::createFromDate($recaudo->fecha)->format('Y-m-d') }} </p>
@stop