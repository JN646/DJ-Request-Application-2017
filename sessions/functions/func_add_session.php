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

//Execute the Query
if(mysqli_query($mysqli,$sql))
		header("refresh:0; url=../session_index.php");
	else
		echo "Not added. Something went wrong.";
		echo '<a href="javascript:history.back()">Go back</a>';
 
// close connection
mysqli_close($mysqli);
?>