<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
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
					<h1 class="display-4">Add Zone</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. Use this screen to create a new zone.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_add_zone.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Zone Name</label>
							<input name="zone_name" id="zone_name" class="form-control" placeholder="Zone Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Zone Description</label>
							<input name="zone_description" id="zone_description" class="form-control" placeholder="Zone Description" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_zone" id="submit_button" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";

// Check for empty fields.
var txt_zone_name = document.getElementById("zone_name");
var txt_zone_description = document.getElementById("zone_description");

// Run function
function Check_Empty() {	
	// Validate year field.
	var x, text;
	
	var name = document.getElementById("zone_name").value;
	var description = document.getElementById("zone_description").value;

    // If x is Not a Number or less than one or greater than 10
    if (name == "" || description == "") {
		//console.log("Condition Failed");
        ValFail();
    } else {
		//console.log("Condition Passed");
		ValSuccess();
    }

	function ValSuccess() {
        text = "Input OK";
		document.getElementById("submit_button").style.display = "";		
	}
	
	function ValFail() {
        text = "You must include a name and a description.";
		
		document.getElementById("submit_button").style.display = "none";			
	}
	
    document.getElementById("status_bar").innerHTML = text;
	status_bar.style.display="";
}

// Add event handler
txt_zone_name.addEventListener("change", Check_Empty);
txt_zone_description.addEventListener("change", Check_Empty);
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>