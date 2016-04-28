@extends('layouts.sidebar')

@section('content')
<h1>Gebruiker wijzigen</h1>
<hr />

{!! Form::model($user, ['method' => 'PATCH', 'action'=> ['UserController@update', $user->user_id]]) !!}

	@include('errors.list')

	<div class="form-group">
		{!! Form::label('name','Naam') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Naam gebruiker']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email','E-mailadres') !!}
		{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mailadres gebruiker']) !!}
	</div>

	<h3>Projecten</h3>
	@foreach($projects as $id=>$name)
		<div class="checkbox">
		  <label>{!! Form::checkbox('project_id[]', $id, (in_array($id, $selectedProjects) ? true : false), '') !!} {!! $name !!}</label>
		</div>	
	@endforeach

    <div class="form-group">
	    <div class="col-sm-1">
	        <a href="/users/" class="btn btn-default">Annuleren</a>
	    </div>
	    <div class="col-sm-2">
	        {!! Form::submit('Wijzigen', ['class' => 'btn btn-primary form-control']) !!}
	    </div>

    </div> 

{!! Form::close() !!}

@stop