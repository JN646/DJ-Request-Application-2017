<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
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

if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Records added successfully.</p>";
	echo "<p><a href='../zones_index.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>