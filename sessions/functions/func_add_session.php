<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

if ($_POST['add_session'] == 'Submit') {
	//Escape user inputs for security
	$session_name = mysqli_real_escape_string($mysqli, $_REQUEST['session_name']);
	
	//Attempt insert query execution
	$sql = "INSERT INTO sessions (session_name) VALUES ('$session_name')";
}

if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Session added successfully.</p>";
	echo "<p><a href='../sessions_index.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>