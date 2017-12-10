<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");

if ($_POST['add_song'] == 'Submit') {
	//Escape user inputs for security
	$song_name = mysqli_real_escape_string($mysqli, $_REQUEST['song_name']);
	$song_artist = mysqli_real_escape_string($mysqli, $_REQUEST['song_artist']);
	$song_year = mysqli_real_escape_string($mysqli, $_REQUEST['song_year']);
	$song_genre = mysqli_real_escape_string($mysqli, $_REQUEST['song_genre']);
	
	//Attempt insert query execution
	$sql = "INSERT INTO songs (song_name, song_artist, song_year, song_genre) VALUES ('$song_name', '$song_artist', '$song_year', '$song_genre')";
}

if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Records added successfully.</p>";
	echo "<p><a href='../index.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>