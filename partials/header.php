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
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/classes/func_lib.php");
?>

<!-- HTML Content -->
<!doctype html>
<html lang="en">
<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Style Sheets -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $environment; ?>css/bootstrap.css"> <!-- Fallback Bootstrap CSS File -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css"> <!-- Custom CSS File -->

	<!-- Favicon -->
	<link rel="icon" href="<?php echo $environment; ?>favicon.ico" type="image/ico" sizes="16x16">

	<!-- JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="<?php echo $environment; ?>js/func_js.js"></script>
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
