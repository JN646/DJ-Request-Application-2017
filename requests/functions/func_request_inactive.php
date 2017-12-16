<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	
	//Attempt insert query execution
	$update = "UPDATE requests SET request_active = 0 WHERE request_id='$_GET[request_id]'";

	//Execute the Query
	if(mysqli_query($mysqli,$update))
			header("refresh:0; url=../request_index.php");
		else
			echo "Not Updated";
	 
	// close connection
	mysqli_close($mysqli);
?>