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
		header("location: http://localhost/djx/djx/accounts/login.php");
		exit;
	}
?>
<head>
	<title>Add Song</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Song</h1>
					<p>Manually add a song to the database.</p>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<form class="col-md-6" action="<?php echo $environment; ?>songs/functions/func_add_song.php" method="post">
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
						<div class="form-row">
						<div class="col-md-6">
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
						<div class="col-md-6">
							<label>Song Year</label>
							<input name="song_year" class="form-control" placeholder="Song Year" type="text"></input>
						</div>
						</div>
						<button class="btn btn-primary" name="add_song" type="submit" value="Submit">Submit</button>
					</form>
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
