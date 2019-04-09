@extends('layouts.master')
@section('header')
	<h2>Modificar egreso</h2>
@stop
@section('content')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
    @endif
	{!! Form::model($egreso, [
        'url' => '/egresos/'.$egreso->id,
        'method' => 'put',
        'route' => ['egresos.update', $egreso->id]
    ]) !!}
		@include('partials.forms.egreso')
	{!! Form::close() !!}
@stop