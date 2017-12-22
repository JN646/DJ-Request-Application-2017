<?php
 /**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

//Select Query
$delete = "DELETE FROM songs WHERE song_id='$_GET[song_id]'";
	
//Execute the Query
if(mysqli_query($mysqli,$delete))
		header("refresh:0; url=../browse_song_artist.php");
	else
		echo "Not deleted. Something went wrong.";
		echo '<a href="javascript:history.back()">Go back</a>';
 
// close connection
mysqli_close($mysqli);
?>