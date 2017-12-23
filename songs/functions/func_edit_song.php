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
					<?php
					$artist = "Edit Song: " . urldecode($_GET['song_id']);
					echo "<h1 class='display-4'>$artist</h1>";
					?>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert.</div>
					<?php
					$UID = (int)$_GET["song_id"];
					$terms = "SELECT * FROM songs WHERE song_id = '$UID'";
					$query = mysqli_query($mysqli, $terms);
					if(mysqli_num_rows($query) > 0){
						while($row = mysqli_fetch_array($query)){
							$song_name = $row['song_name'];
							$artist = $row['song_artist'];
							$album = $row['song_album'];
							$genre = $row['song_genre'];
							$year = $row['song_year'];
						echo "<h1 class='text-left'>" . $row['song_name'] . "</h1>";
						}
					?>	
					<form action="func_update_song.php" method="post">
						<input type="hidden" name="song_ID" value="<?=$UID;?>">
						<div class="form-group">
							<label>Song</label>
							<input class="form-control" type="text" name="ud_song_name" value="<?=$song_name?>"></input>
						</div>
						<div class="form-group">
							<label>Artist</label>
							<input class="form-control" type="text" name="ud_artist" value="<?=$artist?>"></input>
						</div>
						<div class="form-group">
							<label>Album</label>
							<input class="form-control" type="text" name="ud_album" value="<?=$album?>"></input>
						</div>
						<div class="form-group">
							<label>Genre</label>
							<input class="form-control" type="text" name="ud_genre" value="<?=$genre?>"></input>
						</div>
						<div class="form-group">
							<label>Year</label>
							<input class="form-control" type="text" name="ud_year" value="<?=$year?>"></input>
						</div>
						<button class="btn btn-primary" name="add_song" type="submit" value="Submit">Submit</button>
					</form>
					<?php						
					mysqli_free_result($query);
					} else{
						echo "<p>No songs were found.</p>";
						echo '<a href="javascript:history.back()">Go back</a>';
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