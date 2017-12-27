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
	$user_id = mysqli_real_escape_string($mysqli, $_REQUEST['user_id']);
	$session_name = mysqli_real_escape_string($mysqli, $_REQUEST['session_name']);
	$zone_info = mysqli_real_escape_string($mysqli, $_REQUEST['zone_info']);
	$playlist_id = 1; //this must be a UID from the playlist db.
	
	//Attempt insert query execution
	$sql = "INSERT INTO sessions (user_id, session_name, zone_info, playlist) VALUES ('$user_id', '$session_name', '$zone_info', '$playlist_id')";
}

//Execute the Query
if(mysqli_query($mysqli,$sql))
		header("refresh:0; url=../sessions_index.php");
	else
		echo "Not added. Something went wrong.";
		echo '<a href="javascript:history.back()">Go back</a>';
 
// close connection
mysqli_close($mysqli);
?>