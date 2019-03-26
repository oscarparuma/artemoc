@extends('layouts.master')
@section('header')
	<h2>Modificar colaborador</h2>
@stop
@section('content')
	{!! Form::model($colaborador, ['url' => '/colaboradores/'.$colaborador->id, 'method' => 'put']) !!}
		@include('partials.forms.colaborador')
	{!! Form::close() !!}
@stop