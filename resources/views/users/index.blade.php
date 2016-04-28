@extends('layouts.sidebar')
@section('content')
    <h1>Gebruikers</h1>

	<p>Overzicht van alle gebruikers.</p>                                                                                      
	<div class="table-responsive">          
		<table class="table table-hover">
			<thead>
			  <tr>
			    <th>#</th>
			    <th>Naam</th>
			    <th>E-mail</th>
			    <th>Laatste login</th>
			  </tr>
			</thead>
			<tbody>
 	@foreach($users as $user)
			  <tr class="rowSelection" data-href="{{ url('/users/'.$user->user_id.'/edit') }}">
			    <td>{{ $user->user_id }}</td>
			    <td>{{ $user->name }}</td>
			    <td>{{ $user->email }}</td>
			    <td>{{ $user->is_developer }}</td>
			    <td>{{ ($user->show_hours_spent ? 'Ja' : 'Nee') }}</td>
			    <td>{{ $user->last_login }}</td>
			  </tr>
 	@endforeach

			</tbody>
		</table>
	</div>

	<div><a href="{{ url('/users/create') }}" class="btn btn-lg btn-success btn-block"> Nieuw </a></div>
 @stop