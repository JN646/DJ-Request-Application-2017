<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171226
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

	$UID = (int)$_GET["song_id"];
	$sql = "INSERT INTO requests (request_song_id) VALUES ('$UID')";
	mysqli_query($mysqli, $sql);
	echo "Affected rows: ".mysqli_affected_rows($mysqli);
	
	if(mysqli_query($mysqli, $sql)) { //don't know what this does -doesn't seem to be testing for successful insert
		header("refresh:0; url=../request_index.php");
	} else {
		echo "<br>";
		echo "<div class='fluid-container'>";
			echo "<h1>Song Requests</h1>";
			echo "<p>Not Requested</p>";
		echo "</div>";
	}
		
// close connection
mysqli_close($mysqli);
?>
<head>
	<title>Song Request</title>
</head>