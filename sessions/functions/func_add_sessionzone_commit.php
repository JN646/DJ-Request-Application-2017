<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171227
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

if ($_POST['add_session'] == 'Submit') {

	// SELECT all of the zone_id from zone db.
	$terms = "SELECT * FROM zones";
	$result = mysqli_query($mysqli,$terms);
	$rs = mysqli_fetch_array($result);
	$zoneid = (int)$rs['zone_id'];

	// Store the number of IDs into a variable

	// FOR LOOP - Keep looping while i < zonecount
	while($row = mysqli_fetch_array($result)){

		// LOOP into SQL
		$sql = "INSERT INTO songs (song_name, song_artist, song_album, song_year, song_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_year', '$song_genre')";
	}
}


if(mysqli_query($mysqli,$sql1)) {
		// query 1
} else {
		echo "Not added. Something went wrong.";
}

if(mysqli_query($mysqli,$sql2)) {
		// query 2
} else {
		echo "Not added. Something went wrong.";
}

// close connection
mysqli_close($mysqli);

?>