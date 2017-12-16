<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
?>
<div class="col-md-1">
	<br>
	<h3>ADMIN</h3>
	<h5>Songs</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/browse_song.php">Browse Songs</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>requests/request_index.php">Requests</a></li>
	</ul>
	<h5>Config</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php">Songs</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>zones/zones_index.php">Zones</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>sessions/sessions_index.php">Sessions</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>clients/client_index.php">Clients</a></li>
	</ul>
	<h5>Account</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/index.php">Profile</a></li>
	</ul>
</div>