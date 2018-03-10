<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>
<head>
	<title>Song Artists</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<?php
					$genre = urldecode($_GET['song_genre']);
					echo "<h1 class='display-4'>$genre</h1>";
					?>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<br>
					<div class="row" style='margin: 0 auto;'>
						<?php
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
						?>
						</div>
						<p><a href="browse_song_artist.php">Back</a></p>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>
