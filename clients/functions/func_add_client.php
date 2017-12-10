<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

if ($_POST['add_client'] == 'Submit') {
	//Escape user inputs for security
	$client_name = mysqli_real_escape_string($mysqli, $_REQUEST['client_name']);
	$client_description = mysqli_real_escape_string($mysqli, $_REQUEST['client_description']);
	
	//Attempt insert query execution
	$sql = "INSERT INTO clients (client_name, client_description) VALUES ('$client_name', '$client_description')";
}

if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Records added successfully.</p>";
	echo "<p><a href='../client_index.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>