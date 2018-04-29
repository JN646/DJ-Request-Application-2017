<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/

// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");

//Login handler
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>

<!-- Header Content -->
<head>
	<title>Song Request</title>
</head>

<!-- Body Content -->
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">

				<!-- Nav Bar -->
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>

				<!-- Main Content -->
				<div class="col-md-12">
					<br>

					<!-- Jumbotron -->
					<div class="jumbotron jumbo-header" id="header">
						<div class="row">

							<!-- Jumbo Centre -->
							<div class="col-md-9">
								<?php
								// Add venue name.
								echo"<h1 class='display-2 id='h1VenueName' text-center'>$VenueName</h1>";

								// Add venue slogan.
								echo"<h1 class='lead text-center' id='h1VenueSlogan'>$VenueSlogan</h1>";

								?>
							</div>

							<!-- Jumbo Aside -->
							<div class="col-md-3 jumbo-aside" id="jumbo">
								<div class="col-md-12" id="jumbo-inner" style="height: 150px">
								<p>Thank You for choosing the private area of our club. As a VIP you can use these devices to request songs straight to the DJ.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Search Box -->
					<div class="col-sm-12 col-md-6 offset-md-3 offset-sm-0" id="search_back">
						<div class="col-md-12 offset-md-0 offset-sm-0">
							<form class="form-inline my-2 my-lg-0" action="songs/search_song.php" method="get">
								<div class="form-inline">
									<input name="search_val" type="text" id="txtSearch" placeholder="Search" class="form-control mx-sm-2" style="font-size: 24px;"></input>
									<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit"><i class="fas fa-search"></i></button>
								</div>
							</form>
						</div>
					</div>
					<br>

					<!-- Second Row -->
					<div class="row">
						<script>
						SearchBarSize();
						function SearchBarSize() {
							// Fade in Header.
							$( document ).ready(function() {
								$("#header").fadeIn('slow');
							});

							// Expand search box.
							$(document).ready(function() {
								$('#txtSearch').width(200);
								$('#txtSearch').focus(function() {
									$(this).animate({
										width: 500
									})
								});

								// Restore to original size.
								$('#txtSearch').blur(function() {
									$(this).animate({
										width: 200
									})
								});
							});
						}
						</script>
						<?php HomeImages($mysqli); ?>
					</div> <!-- Close row -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
