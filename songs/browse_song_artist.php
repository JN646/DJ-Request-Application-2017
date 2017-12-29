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
	<title>Song Artists</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Artists</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
						<form action="search_song.php" method="get">
							<div class="form-inline">
								<input name="search_val" type="text" placeholder="Search" class="form-control" style="width: 60%"></input>
								<button class="form-control btn btn-primary" name="SearchButton" value="search" type="submit">Search</button>
							</div>
						</form>
						<br>
						<div class="row">
							<?php
							// Attempt select query execution
							$sql = "SELECT DISTINCT song_artist FROM songs ORDER BY song_artist ASC";
							if($result = mysqli_query($mysqli, $sql)){
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
										echo "<div class='col-md-2' style='height: 250px; min-width: 250px'>";
											echo "<div class='col-md-12 border border-dark' style='height: 200px'>";
												echo "<br>";
												echo "<h3 class='text-center'>" . $row['song_artist'] . "</h3>";
												echo "<p class='text-center'><a href=browse_song_artistl.php?song_artist=".urlencode($row['song_artist'])." >View</a></p>";
											echo "</div>";
										echo "</div>";
									}
									// Free result set
									mysqli_free_result($result);
								} else{
									echo "No artists were found.";
								}
							} else{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
							}
							?>
						</div>
						<p><a href="browse_song.php">Back</a></p>
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
