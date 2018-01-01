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
	<title>Song List</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song List</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Complete song list.</p>
					<?php
						// Create an array of every letter.
						$letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");						
						
						// Loop for each letter.
						for ($x = 0; $x <= 25; $x++) {
							echo "<h1>$letters[$x]</h1>";
							echo "<div class='row'>";
							// Attempt select query execution
							$sql = "SELECT * FROM songs WHERE song_name LIKE '$letters[$x]%' ORDER BY song_name ASC";
							if($result = mysqli_query($mysqli, $sql)){
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
										// Divide into columns.
										echo "<div class='col-md-2'>";
											// Display song name and artist.
											echo "<p><b>" . $row['song_name'] . "</b> - " . $row['song_artist'] . "</p>";
										echo "</div>";
									}
									// Free result set
									mysqli_free_result($result);
								} else{
									//echo "No requests were found.";
								}
							} else{
								// Error message.
								echo "ERROR: Could not execute $sql. " . mysqli_error($mysqli);
							}
							echo "</div>";
							// Add horizontal rule.
							echo "<hr>";
						}
					?>
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
