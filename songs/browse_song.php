<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Browse Songs</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Browse Songs</h1>
					<br>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<div class="row">
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h2 class="text-center"><a href="browse_song_artist.php">Browse by Artist</a></h2>
								<img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/250x250.png">
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border">
								<h2 class="text-center"><a href="browse_song_genre.php">Browse by Genre</a></h2>
								<img class="img-responsive img-rounded" width="100%" src="<?php echo $environment; ?>images/250x250.png">
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
