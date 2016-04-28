@extends('layouts.sidebar')
@section('content')
    <h1>Bugs rapportage</h1>

	<p>Overzicht van alle fouten, wensen of wijzigingen.</p>                                                                                      
	<div class="table-responsive">          
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>#</th>
			    <th>Tijd</th>
			    <th>Omschrijving</th>
			    <th>Status</th>
			    <th>Toegevoegd</th>
			    <th>Project</th>
			    <th>Prio</th>
			    <th>Door</th>
			    <th>Gewijzigd</th>
			  </tr>
			</thead>
			<tbody>
 	@foreach($bugs as $bug)
			  <tr class="rowSelection" data-href="{{ url('/bugs', $bug->bug_id) }}">
			    <td>{{ $bug->bug_id }}</td>
			    <td>{{ $bug->total_time_spent }}</td>
			    <td>{{ $bug->subject }}</td>
			    <td>{{ $bug->status_title }}</td>
			    <td>{{ $bug->user_id }}</td>
			    <td>{{ $bug->title }}</td>
			    <td>{{ $bug->priority_id }}</td>
			    <td>{{ $bug->assigned_to_user_id }}</td>
			    <td>{{ $bug->updated_at }}</td>
			  </tr>
 	@endforeach

			</tbody>
		</table>
	</div>

	<div><a href="{{ url('/bugs/create') }}" class="btn btn-lg btn-success btn-block"> Nieuwe bug aanmelden </a></div>

	{!! $bugs->links() !!}
 @stop