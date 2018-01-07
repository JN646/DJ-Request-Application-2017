<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

if ($_POST['add_zone'] == 'Submit') {
	//Escape user inputs for security
	$zone_name = mysqli_real_escape_string($mysqli, $_REQUEST['zone_name']);
	$zone_description = mysqli_real_escape_string($mysqli, $_REQUEST['zone_description']);

	//Attempt insert query execution
	$sql = "INSERT INTO zones (zone_name, zone_description) VALUES ('$zone_name', '$zone_description')";
}

//Execute the sql
if(mysqli_query($mysqli,$sql)) {
		header("refresh:0; url=../zones_index.php");
} else {
	echo "<br>";
	echo "<div class='fluid-container'>";
		echo "<div class='col-md-12'>";
			echo "<h1 class='text-center'>Oops Something Went Wrong.</h1>";
			echo "<p class='text-center'>Zone was not added.</p>";
		echo "</div>";
	echo "</div>";
	echo "<p class='text-center'>Error description: " . mysqli_error($mysqli) . "</p>";
}

// close connection
mysqli_close($mysqli);
?>