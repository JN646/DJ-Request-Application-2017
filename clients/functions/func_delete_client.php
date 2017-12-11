<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171211
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

//Select Query
$delete = "DELETE FROM clients WHERE client_id='$_GET[client_id]'";

//Execute the Query
if(mysqli_query($mysqli,$delete))
		header("refresh:0; url=../client_index.php");
	else
		echo "Not Deleted";
?>