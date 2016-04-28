@extends('layouts.sidebar')
@section('content')
    <h1>Projecten</h1>

	<p>Overzicht van alle projecten.</p>                                                                                      
	<div class="table-responsive">          
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>#</th>
			    <th>Projectnaam</th>
			    <th>Gewijzigd</th>
			  </tr>
			</thead>
			<tbody>
 	@foreach($projects as $project)
			<tr class="rowSelection" data-href="{{ url('/projects/'.$project->project_id.'/edit') }}">
			    <td>{{ $project->project_id }}</td>
			    <td>{{ $project->title }}</td>
			    <td>{{ $project->updated_at }}</td>
			</tr>
 	@endforeach

			</tbody>
		</table>
	</div>

	<div><a href="{{ url('/projects/create') }}" class="btn btn-lg btn-success btn-block"> Nieuw </a></div>
 @stop