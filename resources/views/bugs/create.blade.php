@extends('layouts.sidebar')

@section('content')
<h1>Fout melden</h1>
<hr />

{!! Form::open(['url' => '/bugs', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}

	@include('errors.list')
	@include('bugs.form', ['submitButtonText' => 'Toevoegen'])

{!! Form::close() !!}

@stop