<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

	// TODO
	// Code to delete row and update SQL.
	
if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Records deleted successfully.</p>";
	echo "<p><a href='../index.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>