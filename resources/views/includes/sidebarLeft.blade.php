<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
    	<li class="{{ Request::is('/') ? 'active' : '' }}">
    		<a href="/">Home</a></li>
		<li class="{{ Request::is('bugs*') ? 'active' : '' }}">	    
	    	<a href="/bugs/">Reports</a></li>
	    <li class="{{ Request::is('projects*') ? 'active' : '' }}">
	    	<a href="/projects/">Projecten</a></li>
	    <li><a href="#">Admin</a>
			<ul class="nav nav-second-level collapse in">
			    <li><a href="/users/">- Gebruikers</a></li>
			</ul>

	    </li>
	</ul>
</div>