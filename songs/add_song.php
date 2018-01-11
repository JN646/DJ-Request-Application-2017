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
<head>
	<title>Add Song</title>
</head>
<body>
	<body onload="Check_Empty()">
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Song</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Manually add a song to the database.</p>
					<form class="col-md-6" action="<?php echo $environment; ?>songs/functions/func_add_song.php" method="post">
						<div class="form-group">
							<label>Song Name</label>
							<input name="song_name" id="song_name" class="form-control" placeholder="Song Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Artist</label>
							<input name="song_artist" id="song_artist" class="form-control" placeholder="Song Artist" type="text"></input>
						</div>
						<div class="form-group">
							<label>Song Album</label>
							<input name="song_album" id="song_album" class="form-control" placeholder="Song Album" type="text"></input>
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
							<input name="song_year" id="song_year" class="form-control" placeholder="Song Year" type="text"></input>
						</div>
						</div>
						<button class="btn btn-primary" name="add_song" id="submit_button" type="submit" value="Submit">Submit</button>
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

// Check for empty fields.
var txt_song_name = document.getElementById("song_name");
var txt_song_year = document.getElementById("song_year");

// Add event handler
txt_song_name.addEventListener("change", Check_Empty);
txt_song_year.addEventListener("change", Check_Empty);

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

    // Get the value of the input field with id="song_year"
    x = document.getElementById("song_year").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1900 || x > 2020) {
        text = "Input not valid";
		document.getElementById("submit_button").style.display = "none";
    } else {
        text = "Input OK";
		document.getElementById("submit_button").style.display = "";
    }
    document.getElementById("status_bar").innerHTML = text;
	status_bar.style.display="";	
}
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
