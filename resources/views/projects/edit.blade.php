@extends('layouts.sidebar')

@section('content')
<h1>Project wijzigen</h1>
<hr />

{!! Form::model($project, ['method' => 'PATCH', 'action'=> ['ProjectsController@update', $project->project_id]]) !!}


	@include('errors.list');
	@include('projects.form', ['submitButtonText' => 'Wijzigen']);

{!! Form::close() !!}

@stop