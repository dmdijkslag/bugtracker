
	<div class="form-group ">
		{!! Form::label('project_id','Project', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::select('project_id', $projects, null, ['class' => 'form-control', 'style' => 'max-width:200px;']) !!}
		</div>
	</div>

	<div class="form-group ">
		{!! Form::label('subject','Onderwerp', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Onderwerp']) !!}
		</div>
	</div>

	<div class="form-group ">
		{!! Form::label('description','Omschrijving', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
	</div>


	<div class="form-group">
		{!! Form::label('url','Url', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Website url']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('file_attachment','Bijlage', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::file('image') !!}
		</div>
	</div>

@if (Auth::user()->isDeveloper())	
	<div class="form-group">
		{!! Form::label('published_at','Datum', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control', 'style' => 'max-width:200px;']) !!}
		</div>
	</div>
@endif

	<div class="form-group">
		{!! Form::label('assigned_to_user_id','Toewijzen aan', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::select('assigned_to_user_id', $users, null, ['class' => 'form-control', 'style' => 'max-width:200px;']) !!}
		</div>
	</div>	
	<div class="form-group">
		{!! Form::label('status_id','Status', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::select('status_id', $bugStatus, 1, ['class' => 'form-control', 'style' => 'max-width:200px;']) !!}
		</div>
	</div>	
	<div class="form-group">
		{!! Form::label('priority_id','Prioriteit', ['class' => 'col-sm-2 form-control-label frmLabel']) !!}
		<div class="col-sm-10">
			{!! Form::select('priority_id', $priorities, 3, ['class' => 'form-control', 'style' => 'max-width:200px;']) !!}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
	</div>