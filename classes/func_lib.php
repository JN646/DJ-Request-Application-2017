<?php
// Function Library

// MISC
// Hello World
function HelloWorld() {
    echo "Hello world!";
}

// Home Images
function HomeImages($mysqli) {
  // Attempt select query execution.
  $sql = "SELECT * FROM songs WHERE song_album <> '' ORDER BY RAND () ASC LIMIT 12";

  // Process each row.
  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        echo"<div class='col-md-2' id='song_block'>";
          echo "<div class-'col-md-12 border' border-primary>";
            echo "<a href='songs/song_profile.php?song_id=" .$row['song_id']. "'><img class='card-img-top CoverArtHome' style='width:100%;' onerror=this.src='images/250x250.png' src=\"";
              echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
            echo "\"></a>";
            $name_lim = 14; //string length limit
            if (strlen($row['song_name']) > $name_lim) {
              echo"<h4 class='text-center'>" . substr($row['song_name'], 0, $name_lim-3) . "...</h4>";
            } else {
              echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
            }

            // Song Artist.
            $artist_lim = 10; // String length limit
            if (strlen($row['song_artist']) > $artist_lim) {
              echo"<h5 class='text-center'>" . substr($row['song_artist'], 0, $artist_lim-3) . "...</h5>";
            } else {
              echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
            }

          echo "</div>"; // Inner block.
        echo"</div>"; // Outer block.
      }

      // Free result set
      mysqli_free_result($result);
    } else{
      // No songs in the database.
      echo "<p class='text-center'>No songs were found.</p>";
    }
  } else{
    QueryError($query, $mysqli);
  }
}

// BROWSING
// Browse Song Artists
function BrowseSongArtist($mysqli, $query) {
  // Attempt select query execution
  if($result = mysqli_query($mysqli, $query)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        echo "<div class='col-md-2' style='height: 250px; min-width: 250px'>";
          echo "<div class='col-md-12 border border-dark' style='height: 200px'>";
            echo "<br>";
            echo "<h3 class='text-center'>" . $row['song_artist'] . "</h3>";
            echo "<p class='text-center'><a href=browse_song_artistl.php?song_artist=".urlencode($row['song_artist'])." ><i class='fas fa-search'></i></a></p>";
          echo "</div>";
        echo "</div>";
      }
      // Free result set
      mysqli_free_result($result);
    } else{

      // Nothing Found
      echo "<h3 class='text-center'>No artists were found.</h3>";
    }
  } else{
    QueryError($query, $mysqli);
  }
}

// Browse Things
function BrowseGenre($mysqli) {
  // Attempt select query execution
  $sql = "SELECT DISTINCT song_genre FROM songs WHERE song_genre <> '' ORDER BY song_genre ASC";
  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        echo "<div class='col-md-2'>";
          echo "<h3><a href=browse_song_genrel.php?song_genre=".urlencode($row['song_genre']).">" . $row['song_genre'] . "</a></h3>";
        echo "</div>";
      }
      // Free result set
      mysqli_free_result($result);
    } else{
      echo "No requests were found.";
    }
  } else{
    QueryError($query, $mysqli);
  }
}

// Broken
function BrowseArtistL($mysqli, $artist) {
  // Attempt select query execution
  $sql = "SELECT * FROM songs WHERE song_artist='$artist' ORDER BY song_name ASC";
  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        echo"<div class='col-md-2'>";
          echo "<div class-'col-md-12 border' border-primary>";

          // Cover Image.
          echo "<a href='song_profile.php?song_id=" .$row['song_id']. "'><img class='card-img-top' onerror=this.src='../images/250x250.png' src=\"";
            echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
          echo "\"></a>";

          // Name and artist.
          echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
          echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";

          // Container for links.
          echo"<table width=100%>";

            // Checks to see if the user has logged in.
            if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

              // Non-logged in user
              echo"<td class='text-center'><a href=../requests/functions/func_add_request.php?song_id=" .$row['song_id']. "><i class='fas fa-check'></i></a></td>";
            } else {

              // Logged in user.
              // Request a song.
              echo"<td class='text-center'><a href=../requests/functions/func_add_request.php?song_id=" .$row['song_id']. "><i class='fas fa-check'></i></a></td>";

              // Edit a song.
              echo"<td class='text-center'><a href=functions/func_edit_song.php?song_id=" .$row['song_id']. "><i class='fas fa-edit'></i></a></td>";

              // Delete a song.
              echo"<td class='text-center'><a href=functions/func_delete_song.php?song_id=" .$row['song_id'].
              "><i class='fas fa-trash-alt'></i></a></td>";
            }
          echo"</table>";
          echo "</div>";
        echo"</div>";
      }
      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No songs by $artist were found.";
    }
  } else {
    QueryError($sql, $mysqli);
  }
}
function BrowseGenreL($mysqli, $genre) {
  // Attempt select query execution
  // Create an array of every letter.
  $letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

  // Loop for each letter.
  for ($x = 0; $x <= 25; $x++) {
    echo "<h1>$letters[$x]</h1>";
    echo "<div class='row'>";
    $sql = "SELECT * FROM songs WHERE song_genre='$genre' ORDER BY song_name ASC";
    if($result = mysqli_query($mysqli, $sql)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          echo"<div class='col-md-2'>";
            echo "<div class-'col-md-12 border' border-primary>";
              //echo "<img class='card-img-top' onerror=this.src='../images/250x250.png' src=\"";
              //echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
              //echo "\">";
              echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
              echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
              echo"<table width=100%>";
                echo"<td class='text-center'><a href=../requests/functions/func_add_request.php?song_id=" .$row['song_id']. ">Request</a></td>";
                echo"<td class='text-center'><a href=functions/func_edit_song.php?song_id=" .$row['song_id']. ">Edit</a></td>";
                echo"<td class='text-center'><a href=functions/func_delete_song.php?song_id=" .$row['song_id']. ">Delete</a></td>";
              echo"</table>";
            echo "</div>";
          echo"</div>";
        }
        // Free result set
        mysqli_free_result($result);
      } else{
        echo "No songs were found.";
      }
    } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }
    echo "</div>";
    echo "<hr>";
  }
}

// SONG MANIPULATION
// Add Songs
function AddSong($mysqli) {
  if ($_POST['add_song'] == 'Submit') {
  	//Escape user inputs for security
  	$song_name = mysqli_real_escape_string($mysqli, $_REQUEST['song_name']);
  	$song_artist = mysqli_real_escape_string($mysqli, $_REQUEST['song_artist']);
  	$song_album = mysqli_real_escape_string($mysqli, $_REQUEST['song_album']);
  	$song_year = mysqli_real_escape_string($mysqli, $_REQUEST['song_year']);
  	$song_genre = mysqli_real_escape_string($mysqli, $_REQUEST['song_genre']);

  	//Attempt insert query execution
  	$sql = "INSERT INTO songs (song_name, song_artist, song_album, song_year, song_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_year', '$song_genre')";
  }

  if(mysqli_query($mysqli,$sql))
  		header("refresh:0; url=../add_song.php");
  	else
      QueryError($query, $mysqli);

  // close connection
  mysqli_close($mysqli);
}

// GLOBALS
// Query Error
function QueryError($query, $mysqli) {
  echo "ERROR: Could not able to execute $query. " . mysqli_error($mysqli);
}

 ?>
