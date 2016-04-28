@extends('layouts.sidebar')

@section('content')
<h1>Nieuw project aanmaken</h1>
<hr />

{!! Form::open(['url' => '/projects']) !!}

	@include('errors.list');
	@include('projects.form', ['submitButtonText' => 'Toevoegen']);

{!! Form::close() !!}

@stop