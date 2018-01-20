<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171227
*/
?>
<div class="col-md-1" style="min-width: 100px">
	<br>
	<h3>ADMIN</h3>
	<h5>Songs</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>requests/request_index.php">My Requests</a></li>
	</ul>
	<h5>Config</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php">Songs</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>zones/zones_index.php">Zones</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>sessions/sessions_index.php">Sessions</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>clients/client_index.php">Clients</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>venue/venue_index.php">Venue</a></li>
	</ul>
	<h5>Admin</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/index.php">Dashboard</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>accounts/logout.php">Logout</a></li>
	</ul>
</div>