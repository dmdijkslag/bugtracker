<h3>Reactie toevoegen</h3>
<hr />

{!! Form::open(['url' => '/bugs/'. $bug->bug_id .'/comment', 'files'=>true]) !!}

	@include('errors.list')

	<div class="form-group">
		{!! Form::label('description','Omschrijving') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('comment_url','Url') !!}
		{!! Form::text('comment_url', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('file_attachment','Bijlage') !!}
		{!! Form::file('file_attachment', ['class' => 'form-control']) !!}
	</div>
	@if (Auth::user()->is_developer)
		<div class="form-group">
			{!! Form::label('time_spent','Tijd in min.') !!}
			{!! Form::text('time_spent', null, ['class' => 'form-control']) !!}
		</div>
	@endif
	<h4>Reactie versturen naar:</h4>
	<div id="commentUsers">
		@foreach($users as $user)
		  <label class="checkbox-inline">{!! Form::checkbox('recipients[]', $user->user_id, null, '') !!} {!! $user->name !!}</label>
		@endforeach	
	</div>
	<div class="form-group">
		{!! Form::submit('Opslaan', ['class' => 'btn btn-primary form-control']) !!}
	</div>	

{!! Form::close() !!}