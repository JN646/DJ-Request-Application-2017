<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171222
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Edit Song</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Update Song</h1>
					<p>A song should be updated here.</p>
				    <?php
					$ud_ID = (int)$_POST["song_ID"];
					
					//$ud_song_name = mysql_real_escape_string($_POST["ud_song_name"]);
					//$ud_artist = mysql_real_escape_string($_POST["ud_artist"]);
					//$ud_album = mysql_real_escape_string($_POST["ud_album"]);
					//$ud_genre = mysql_real_escape_string($_POST["ud_genre"]);
					//$ud_year = mysql_real_escape_string($_POST["ud_year"]);
					
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
					
					//for bug fixing
					$ar = (int)mysqli_affected_rows();
					echo "<p>Affected rows: $ar</p>";
					
					if((int)mysqli_affected_rows()>1){
						echo "<p>($ud_ID) Record Updated<p>";
					}else{
						echo "<p>Error. Song $ud_ID Not Updated. FIX: The song may well be updated - Possible incorrect error message<p>";
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