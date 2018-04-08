<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
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

<!-- Header Content -->
<head>
	<title>Add Song</title>
</head>

<!-- Body -->
<body>

	<!-- Check_Empty Function -->
	<body onload="Check_Empty()">

	<!-- Container -->
	<div class="fluid-container">

		<!-- Main Body -->
		<div class="col-md-12">

			<!-- Row -->
			<div class="row">

				<!-- Navigation Bar -->
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>

				<!-- Centre Content -->
				<div class="col-md-11">
					<br>

					<!-- Title -->
					<h1 class="display-4">Add Song</h1>

					<!-- Status Bar -->
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Manually add a song to the database.</p>

					<!-- Form -->
					<form class="col-md-6" action="<?php echo $environment; ?>songs/functions/func_add_song.php" method="post">

						<!-- Song Name -->
						<div class="form-group">
							<label>Song Name</label>
							<input name="song_name" id="song_name" class="form-control" placeholder="Song Name" type="text"></input>
						</div>

						<!-- Song Artist -->
						<div class="form-group">
							<label>Song Artist</label>
							<input name="song_artist" id="song_artist" class="form-control" placeholder="Song Artist" type="text"></input>
						</div>

						<!-- Song Album -->
						<div class="form-group">
							<label>Song Album</label>
							<input name="song_album" id="song_album" class="form-control" placeholder="Song Album" type="text"></input>
						</div>

						<!-- Form Row -->
						<div class="form-row">

							<!-- Genre -->
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

						<!-- Song Year -->
						<div class="col-md-6">
							<label>Song Year</label>
							<input name="song_year" id="song_year" class="form-control" placeholder="Song Year" type="text"></input>
						</div>

						<!-- Submit -->
						</div>
						<button class="btn btn-primary" name="add_song" id="submit_button" type="submit" value="Submit">Submit</button>
					</form>

					<!-- Close Divs -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>

<!-- JS -->
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";

// Check for empty fields.
var txt_song_name = document.getElementById("song_name");
var txt_song_year = document.getElementById("song_year");

// Run function
function Check_Empty() {
	// Validate song name field.
	if(txt_song_name.value == "") {
		document.getElementById("submit_button").style.display = "none";
	} else {
		document.getElementById("submit_button").style.display = "";
	}

	// Validate year field.
	var x, text;

	var year = document.getElementById("song_year").value;
	var title = document.getElementById("song_name").value;

    // If x is Not a Number or less than one or greater than 10
    if ((isNaN(year) || year < 1900 || x > 2020) || (title == "")) {
		console.log("Condition Failed");
        ValFail();
    } else {
		console.log("Condition Passed");
		ValSuccess();
    }

	function ValSuccess() {
        text = "Input OK";
		document.getElementById("submit_button").style.display = "";
	}

	function ValFail() {
        text = "You must include a title and a valid date.";
		document.getElementById("submit_button").style.display = "none";
	}

    document.getElementById("status_bar").innerHTML = text;
	status_bar.style.display="";
}

// Add event handler
txt_song_name.addEventListener("change", Check_Empty);
txt_song_year.addEventListener("change", Check_Empty);
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
