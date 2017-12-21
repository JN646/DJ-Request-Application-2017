<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171220
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	
	//Execute the sql
if(mysqli_query($mysqli,$sql))
		header("refresh:0; url=../zones_index.php");
	else
		echo "Not Updated";
?>