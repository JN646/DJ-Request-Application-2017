<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171230
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
	<title>Add Session</title>
</head>
<body>
	<body onload="Check_Empty()">
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Session</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>Create a session to start receiving requests.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_add_session.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Session Name</label>
							<input name="session_name" class="form-control" id="session_name" placeholder="Session Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Session Description</label>
							<input name="session_description" class="form-control" id="session_description" placeholder="Session Description" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_session" id="submit_button" type="submit" value="Submit">Submit</button>
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
var txt_session_name = document.getElementById("session_name");
var txt_session_description = document.getElementById("session_description");

// Run function
function Check_Empty() {	
	// Validate year field.
	var x, text;
	
	var name = document.getElementById("session_name").value;
	var description = document.getElementById("session_description").value;

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
        text = "Fields must not be empty.";
		
		document.getElementById("submit_button").style.display = "none";			
	}
	
    document.getElementById("status_bar").innerHTML = text;
	status_bar.style.display="";
}

// Add event handler
txt_session_name.addEventListener("change", Check_Empty);
txt_session_description.addEventListener("change", Check_Empty);
</script>
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>