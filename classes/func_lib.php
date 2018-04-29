<?php
// Function Library

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

        // Create song block.
        echo"<div class='col-md-2' id='song_block'>";

          // Set block border.
          echo "<div class-'col-md-12 border' border-primary>";

            // Cover Image.
            echo "<a href='songs/song_profile.php?song_id=" .$row['song_id']. "'><img class='card-img-top' onerror=this.src='images/250x250.png' src=\"";
              echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
            echo "\"></a>";

            // Song Name.
            $name_lim = 14; //string length limit
            if (strlen($row['song_name']) > $name_lim) {
              echo"<h4 class='text-center'>" . substr($row['song_name'], 0, $name_lim-3) . "...</h4>";
            } else {
              echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
            }

            // Song Artist.
            $artist_lim = 10; //string length limit
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

    // Error message.
    echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
  }
}

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

    // Database Error
    echo "ERROR: Could not able to execute $query. " . mysqli_error($mysqli);
  }
}

 ?>
