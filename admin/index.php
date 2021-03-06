<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
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
<!-- Header Content -->
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

					<!-- Header -->
					<h1 class="display-4">Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to your Dashboard.</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>Site control panel. Use this dashboard to control and manage your instance.</p>
					<!-- Tools -->
					<div class="row">

						<!-- Sessions -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-align-justify"></i> Sessions</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>sessions/sessions_index.php">Session Home</a></li>
								</ul>
							  </div>
							</div>
						</div>

						<!-- Songs -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-music"></i> Songs</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>songs/index.php">Song Home</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>songs/add_song.php">Song Add</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>songs/list_song.php">Song List</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>songs/browse_song.php">Browse Songs</a></li>
								</ul>
							  </div>
							</div>
						</div>

						<!-- Client Devices -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-laptop"></i> Client Devices</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>clients/client_index.php">Client Home</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>clients/add_client.php">Client Add</a></li>
								</ul>
							  </div>
							</div>
						</div>

						<!-- Accounts -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-user"></i> Account</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>accounts/accounts_index.php">Client Home</a></li>
									<li class="list-group-item"><a href="#">Account Profile</a></li>
								</ul>
							  </div>
							</div>
						</div>

						<!-- Zones -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-th-large"></i> Zones</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>zones/zones_index.php">Zones Home</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>zones/add_zone.php">Zones Add</a></li>
								</ul>
							  </div>
							</div>
						</div>

						<!-- Venues -->
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
							<div class="card">
							  <h5 class="card-header"><i class="fas fa-home"></i> Venue</h5>
							  <div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><a href="<?php echo $environment; ?>venue/venue_index.php">Venue Home</a></li>
									<li class="list-group-item"><a href="<?php echo $environment; ?>venue/venue_css.php">Venue CSS</a></li>
								</ul>
							  </div>
							</div>
						</div>
					</div> <!-- Close row -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>
