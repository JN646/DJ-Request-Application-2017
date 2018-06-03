<?php
// SONG /**

class Songs
{
  // Globals
  $SongName = "";
  $SongArtist = "";
  $SongAlbum = "";
  $SongYear = 2000;
  $SongGenre = "";

  function SongValidate() {
    // Check against blank song names.
    if ($SongName == "") {
      echo "You must have a song name.";
    }
    // Check against blank song albums.
    if ($SongAlbum == "") {
      echo "You will need to specify an album if you wish to have cover art.";
    }
    // Check against invalid song years.
    if ($SongYear !== "") {

      // Validation Variables
      CONST SONGYEARLOWER = 1900;
      CONST SONGYEARUPPER = 2100;

      if ($SongYear < SONGYEARLOWER || $SongYear > SONGYEARUPPER) {
        echo "Invalid song year. Please enter between " . SONGYEARLOWER . " and " . SONGYEARUPPER;
      }
    }
  }

  function SongPass() {
    $sql = "INSERT INTO songs (song_name, song_artist, song_album, song_year, song_genre) VALUES ('SongName', 'SongArtist', '$SongAlbum', '$SongYear', '$SongGenre')";


    if(mysqli_query($mysqli,$sql)) {
      echo "Song added.";
    } else {
    	echo "Not added. Something went wrong.";
    }

    // close connection
    mysqli_close($mysqli);
  }
}
 ?>
