<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171227
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	//include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

	$ud_ID = (int)$_POST["zone_id"];
	
	$zone_name = $_POST["zone_name"];
	$zone_description = $_POST["zone_description"];
	
	$terms = "UPDATE zones
	SET
	zone_name = '$zone_name',
	zone_description = '$zone_description'
	WHERE song_ID='$ud_ID'";
	
	$query = mysqli_query($mysqli, $terms);
	mysqli_query($query);

	if($query) {
		header("refresh:0; url=../zones_index.php");
		}
	else {
		echo "Not Updated";
		echo '<a href="javascript:history.back()">Go back</a>';
		}
	?>
?>