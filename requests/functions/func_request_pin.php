<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	
	//Attempt insert query execution
	$pin = "UPDATE requests SET request_pinned = 1 WHERE request_id='$_GET[request_id]'";

	//Execute the Query
	if(mysqli_query($mysqli,$pin))
			header("refresh:0; url=../request_index.php");
		else
			echo "Not Pinned";
	 
	// close connection
	mysqli_close($mysqli);
?>