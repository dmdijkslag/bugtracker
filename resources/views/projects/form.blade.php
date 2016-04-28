	<div class="form-group">
		{!! Form::label('title','Projectnaam') !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Projectnaam']) !!}
	</div>

    <div class="form-group">
	    <div class="col-sm-1">
	        <a href="/projects/" class="btn btn-default">Annuleren</a>
	    </div>
	    <div class="col-sm-2">
	        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
	    </div>

    </div> 	