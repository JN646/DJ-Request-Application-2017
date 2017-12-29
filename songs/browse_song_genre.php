<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>
<head>
	<title>Song Genres</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Genres</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<div class="row">
						<?php
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
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
						}
						?>
					</div>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
