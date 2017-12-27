<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	session_start();															// Initialise the session
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
		header("location: http://localhost/djx/djx/accounts/login.php");
		exit;
	}
?>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Dashboard</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Site control panel. Use this dashboard to control and manage your instance.</p>
					<!-- Tools -->
					<div class="row">
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3>Sessions</h3>
								<ul>
									<li><a href="<?php echo $environment; ?>sessions/sessions_index.php">Session Home</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3>Songs</h3>
								<ul>
									<li><a href="<?php echo $environment; ?>songs/index.php">Song Home</a></li>
									<li><a href="<?php echo $environment; ?>songs/add_song.php">Song Add</a></li>
									<li><a href="<?php echo $environment; ?>songs/list_song.php">Song List</a></li>
									<li><a href="<?php echo $environment; ?>songs/browse_song.php">Browse Songs</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3>Clients</h3>
								<ul>
									<li><a href="<?php echo $environment; ?>clients/client_index.php">Client Home</a></li>
									<li><a href="<?php echo $environment; ?>clients/add_client.php">Client Add</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3>Account</h3>
								<ul>
									<li><a href="<?php echo $environment; ?>accounts/accounts_index.php">Client Home</a></li>
									<li><a href="#">Account Profile</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3>Zones</h3>
								<ul>
									<li><a href="<?php echo $environment; ?>zones/zones_index.php">Zones Home</a></li>
									<li><a href="<?php echo $environment; ?>zones/add_zone.php">Zones Add</a></li>
								</ul>
							</div>
						</div>
					</div> <!-- Close row -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>