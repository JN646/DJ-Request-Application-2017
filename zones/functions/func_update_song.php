<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171222
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
//include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

$ud_ID = (int)$_POST["song_ID"];

$ud_song_name = $_POST["ud_song_name"];
$ud_artist = $_POST["ud_artist"];
$ud_album = $_POST["ud_album"];
$ud_genre = $_POST["ud_genre"];
$ud_year = $_POST["ud_year"];

$terms = "UPDATE songs
SET
song_name = '$ud_song_name',
song_artist = '$ud_artist',
song_album = '$ud_album',
song_genre = '$ud_genre',
song_year = '$ud_year'
WHERE song_ID='$ud_ID'";

$query = mysqli_query($mysqli, $terms);
mysqli_query($query);

//if(mysqli_affected_rows($mysqli)>0){
//	header("refresh:0; url=../browse_song.php");
	//echo "<p>$ud_ID Record Updated! ToDo: Auto forward page.<p>";
//}else{
//	echo "<p>Error. Song $ud_ID Not Updated.<p>";
//}

if($query) {
	echo "<h1>Song Updated</h1>";
	echo '<a href="javascript:history.back()">Go back</a>';
	}
else {
	echo "Not Updated";
	echo '<a href="javascript:history.back()">Go back</a>';
	}
?>