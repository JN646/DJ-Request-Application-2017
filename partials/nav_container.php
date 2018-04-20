<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171227
*/
?>
<div class="col-md-1" style="min-width: 100px">
	<br>

	<!-- Header -->
	<h3>ADMIN</h3>

	<!-- Songs -->
	<div class="card">
		<div class="card-header">
			<h5>Songs</h5>
		</div>
		<ul class="nav flex-column">
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>requests/request_index.php">My Requests</a></li>
		</ul>
	</div>
	<br>

	<!-- Config -->
	<div class="card">
		<div class="card-header">
			<h5>Config</h5>
		</div>
		<ul class="nav flex-column">
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php"><i class="fas fa-music"></i> Songs</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>zones/zones_index.php"><i class="fas fa-th-large"></i> Zones</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>sessions/sessions_index.php"><i class="fas fa-align-justify"></i> Sessions</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>clients/client_index.php"><i class="fas fa-laptop"></i> Clients</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>venue/venue_index.php"><i class="fas fa-home"></i> Venue</a></li>
		</ul>
	</div>
	<br>

	<!-- Admin -->
	<div class="card">
		<div class="card-header">
			<h5>Admin</h5>
		</div>
		<ul class="nav flex-column">
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/index.php"><i class="fas fa-tachometer-alt"></i> Dash</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>accounts/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
		</ul>
	</div>
</div>
