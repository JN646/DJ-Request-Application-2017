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
	$sql = "INSERT INTO requests (request_song_id, request_session_id) VALUES ('$UID', '1')";
	
	// Run the query.
	if(mysqli_query($mysqli, $sql)) {
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