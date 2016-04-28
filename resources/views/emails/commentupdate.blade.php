<table>
	<tr>
		<td>Er is een reactie toegevoegd aan bug #{{ $bug->bug_id }} - {{ $bug->subject }}</td>
	</tr>
	<tr>
		<td>Klik op de link om de reactie te bekijken.</td>
	</tr>
	<tr>
		<td><a href="{{ $link = url('bugs', $bug->bug_id) }}"> {{ $link }} </a></td>
	</tr>
	<tr>
		<td><br/>Met vriendelijke groet,</td>
	</tr>
	<tr>
		<td><br/>Bugtracker</td>
	</tr>
</table>