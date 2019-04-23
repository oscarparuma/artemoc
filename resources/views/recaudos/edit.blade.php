@extends('layouts.master')
@section('header')
	<h2>Modificar recaudo</h2>
@stop
@section('content')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
    @endif
	{!! Form::model($recaudo, [
        'url' => '/recaudos/'.$recaudo->id,
        'method' => 'put',
        'route' => ['recaudos.update', $recaudo->id]
    ]) !!}
		@include('partials.forms.recaudo')
	{!! Form::close() !!}
@stop