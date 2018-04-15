<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/classes/class_lib.php");
?>

<!-- HTML Content -->
<!DOCTYPE html>
<html>
<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Style Sheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css"> <!-- Custom CSS File -->

	<!-- Favicon -->
	<link rel="icon" href="<?php echo $environment; ?>favicon.ico" type="image/ico" sizes="16x16">

	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

	<a class='navbar-brand' href='<?php echo $environment; ?>index.php'><?php echo $VenueName; ?></a>
	<div class="collapse navbar-collapse" id="navbarNav">

		<!-- Navbar Items -->
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active"><a class="nav-link" href="<?php echo $environment; ?>index.php">Home <span class="sr-only">(current)</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/browse_song.php">Browse</a></li>
			<li class="nav-item"><a class="nav-link disabled" href="<?php echo $environment; ?>system/debug.php">DEBUG</a></li>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="<?php echo $environment; ?>songs/search_song.php" method="get">
			<input class="form-control mr-sm-2" name="search_val" type="text" placeholder="Search" class="form-control" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit"><i class="fas fa-search"></i></button>
		</form>
	</div>
</nav> <!-- Navigation bar -->
