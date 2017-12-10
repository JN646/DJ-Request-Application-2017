<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Song Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Song</h1>
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
							<label>Song Genre</label>
							<input name="song_genre" class="form-control" placeholder="Song Genre" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Year</label>
							<input name="song_year" class="form-control" placeholder="Song Year" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_song" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>