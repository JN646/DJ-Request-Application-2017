<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171226
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	
	// SELECT requests WHERE id = GET
	$check = "SELECT * FROM requests WHERE request_id='$_GET[request_id]'";
	
	// Store pin value as a variable
	$result = mysqli_query($mysqli, $check);
	$rs = mysqli_fetch_array($result);

	$value = $rs['request_pinned'];
	$togpin = $value;
	
	//Execute the Query
	if(mysqli_query($mysqli,$check))  {
		// Check and save as another variable
		if($value == 1) {
			$togpin = 0;
		}
		if($value == 0) {
			$togpin = 1;
		}
	}
	
	// Write variable to the database
	$pin = "UPDATE requests SET request_pinned = $togpin WHERE request_id='$_GET[request_id]'";
	
	//Execute the Query
	if(mysqli_query($mysqli,$pin))
			header("refresh:0; url=../request_index.php");
		else
			echo "Not Pinned";
	 
	// close connection
	mysqli_close($mysqli);
?>