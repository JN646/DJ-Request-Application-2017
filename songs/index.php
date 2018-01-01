<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
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
	<title>Song Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Management</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<div class="row">
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/list_song.php"><img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/music_list.png">Song List</a></h3>
								<br>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/add_song.php"><img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/music_add.png">Add Song</a></h3>
								<br>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/browse_song.php"><img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/music_browse.png">Browse Songs</a></h3>
								<br>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/import_songs.php"><img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/music_import.png">Import Songs</a></h3>
								<br>
							</div>
						</div>
					</div>
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
