<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");


/*
Order of operations:
receive values of zone id's and session id.
for each activated zone id, add a row to sessionzone
*/

if ($_POST['add_session'] == 'Submit') {
	
	// SELECT all of the zone_id from zone db.
	// Store the number of IDs into a variable
	
	// FOR LOOP - Keep looping while i < zonecount
	$Zones = mysqli_real_escape_string($mysqli, $_REQUEST['ZONE ID']);

	// LOOP into SQL
	$sql = "INSERT INTO songs (song_name, song_artist, song_album, song_year, song_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_year', '$song_genre')";
	
	// End Loop
}

if(mysqli_query($mysqli,$sql))
		header("refresh:0; url=../add_song.php");
	else
		echo "Not added. Something went wrong.";
 
// close connection
mysqli_close($mysqli);

?>