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
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
// Character Pagination
$char = '';
// Get the Char from URL
if(isset($_GET["char"]))
{
	$char = $_GET["char"];
	$char = preg_replace('#[^a-z]#i', '', $char);
	$query = "SELECT DISTINCT song_artist FROM songs WHERE song_artist LIKE '$char%' ORDER BY song_artist ASC";
}
else
{
	// Show all artists if no char in URL.
	$query = "SELECT DISTINCT song_artist FROM songs ORDER BY song_artist ASC";
}
$result = mysqli_query($mysqli, $query);
?>

<!-- Header Content -->
<head>
	<title>Song Artists</title>
</head>

<!-- Body -->
<body>

	<!-- Container -->
	<div class="fluid-container">
		<div class="col-md-12">

			<!-- Row -->
			<div class="row">

				<!-- Navigation Bar -->
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>

				<!-- Main Content -->
				<div class="col-md-11">
					<br>

					<!-- Title -->
					<h1 class="display-4">Browse by Artist</h1>

					<!-- Row -->
					<div class="row">
						<div class="col-md-5">

							<!-- Status Bar -->
							<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>

							<!-- Form -->
							<form class="form-inline my-2 my-lg-0" action="search_song.php" method="get">
								<div class="form-inline">
									<input name="search_val" type="text" placeholder="Search" class="form-control mr-sm-2"></input>
									<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</form>
						</div>
						<div class="col-md-7">
							<?php

							// Define characters.
							$character = range('A', 'Z');

							// Produce paginated class.
							echo "<ul class='pagination'>";

							// Generate a link for each letter.
							foreach($character as $alphabet)
								{

									// Create a link for every letter.
									echo "<li class='page-item'><a class='page-link' href='browse_song_artist.php?char=".$alphabet."'>".$alphabet."</a></li>";
								}
							echo '</ul>';
							?>
						</div>
					</div>
						<div class="row">

							<?php
								BrowseSongArtist($mysqli, $query);
							?>
						</div>

						<!-- Back Buttons -->
						<p><a href="browse_song.php">Back</a></p>

				<!-- Close Divs -->
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
