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
					$artist = "Edit " . urldecode($_GET['song_id']);
					echo "<h1 class='display-4'>$artist</h1>";
					?>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Default edit text goes here.</p>
					<?php
					$UID = (int)$_GET["song_id"];
					$query = mysqli_query("SELECT * FROM songs WHERE song_id = '$UID'");
					
					if($query = mysqli_query($mysqli, $query)){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								$song_name = $row['song_name'];
								$artist = $row['song_artist'];
								$album = $row['song_album'];
							}
							// Free query set
							mysqli_free_result($query);
						} else{
							echo "<p>No songs were found.</p>";
							echo '<a href="javascript:history.back()">Go back</a>';
						}
					} else{
						echo "ERROR: Not able to execute $query. " . mysqli_error($mysqli);
						echo '<a href="javascript:history.back()">Go back</a>';
					}
					?>
					<form action="<?php echo $environment; ?>songs/functions/func_add_song.php" method="post">
						<div class="form-group">
							<label>Song Name</label>
							<input name="song_name" class="form-control" placeholder="Song Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Artist</label>
							<input name="song_artist" class="form-control" placeholder="Song Artist" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Album</label>
							<input name="song_album" class="form-control" placeholder="Song Album" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Genre</label>
							<select name="song_genre" class="form-control">
								<option value="Pop">Pop</option>
								<option value="Rock">Rock</option>
								<option value="RnB">RnB</option>
								<option value="EDM">EDM</option>
								<option value="Hip-Hop">Hip-Hop</option>
								<option value="Rap">Rap</option>
								<option value="Grime">Grime</option>
							</select>
						</div>
						<div class="form-group">
							<label>Song Year</label>
							<input name="song_year" class="form-control" placeholder="Song Year" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_song" type="submit" value="Submit">Submit</button>
					</form>
					<?php
					// } else {
						// echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
					// }
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