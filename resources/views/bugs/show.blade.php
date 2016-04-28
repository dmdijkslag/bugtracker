@extends('layouts.sidebar')
@section('content')
    <h1>{{ $bug->subject }}</h1>

    <div class="row"> 
	    <div class="col-sm-1">
	        <a href="/bugs/{{ $bug->bug_id }}/edit/" class="btn btn-success">Wijzigen</a>
	    </div>
	    <div class="col-sm-1">
	        <a href="/bugs/{{ $bug->bug_id }}/sendupdate/" class="btn btn-success">Verstuur mail</a>
	    </div>
    </div>
    <div class="row"> 
	    <div class="col-sm-2">Project:</div>
	    <div class="col-sm-2">{{ $bug->project->title }}</div>
	    <div class="col-sm-2">Aanmelder:</div>
	    <div class="col-sm-2"></div>
    </div> 
    <div class="row"> 
	    <div class="col-sm-2">Status:</div>
	    <div class="col-sm-2">xxx</div>
	    <div class="col-sm-2">Aangemeld:</div>
	    <div class="col-sm-2">xxxx</div>
    </div> 
    <div class="row"> 
	    <div class="col-sm-2">Prioriteit:</div>
	    <div class="col-sm-2">xxx</div>
	    <div class="col-sm-2">Toegewezen aan:</div>
	    <div class="col-sm-2">xxxx</div>
    </div> 
    <br/>
	<div class="row bugDescription"> 
	    <div class="col-sm-8">{{ $bug->description }}</div>
    </div> 

    <h2>Reacties</h2>

    @if (count($comments) > 0)
		@foreach($comments as $comment)
		<div class="row bugComment"> 
		    <div class="col-sm-8">{{ $comment->description }}</div>
	    </div> 
		@endforeach
	@else
		<div class="row bugNoComment"> 
		    <div class="col-sm-8">Er zijn nog geen reacties</div>
	    </div> 

	@endif

	@include('bugs.addcomment')	
@stop