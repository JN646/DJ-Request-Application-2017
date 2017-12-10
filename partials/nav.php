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
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php">Song Home</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/list_song.php">Song List</a></li>
	</ul>
	<h5>Zones</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>zones/zones_index.php">Zones Home</a></li>
	</ul>
	<h5>Sessions</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>sessions/sessions_index.php">Sessions Home</a></li>
	</ul>
	<h5>Clients</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>clients/client_index.php">Clients Home</a></li>
	</ul>
	<h5>Account</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/index.php">Profile</a></li>
	</ul>
</div>