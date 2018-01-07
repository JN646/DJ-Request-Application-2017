<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171226
*/

// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

$UID = (int)$_GET["song_id"];
$sql = "INSERT INTO requests (request_song_id, request_session_id, request_pinned) VALUES ('$UID', '1', '0')";

// Run the query.
if(mysqli_query($mysqli, $sql)) {
	header("refresh:0; url=../../index.php");
	exit;
} else {
	echo "<br>";
	echo "<div class='fluid-container'>";
		echo "<div class='col-md-12'>";
			echo "<h1 class='text-center'>Oops Something Went Wrong.</h1>";
			echo "<p class='text-center'>The song with the ID of $UID was not requested.</p>";
		echo "</div>";
	echo "</div>";
}
		
// close connection
mysqli_close($mysqli);
?>
<head>
	<title>Song Request</title>
</head>