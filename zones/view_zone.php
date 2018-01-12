<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171220
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}

$zname = "SELECT * FROM zones WHERE zone_id='%$_GET[zone_id]%'";
$result = mysqli_query($mysqli, $zname);
$rs = mysqli_fetch_array($result);
echo $rs;
$zone_name = $rs['zone_name'];
?>
<head>
	<title>View Zone</title>
</head>
<body>
	<body onload="Check_Empty()">
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">View Zone</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<?php
					$UID = (int)$_GET["zone_id"];
					$terms = "SELECT * FROM zones WHERE zone_id = '$UID'";
					$query = mysqli_query($mysqli, $terms);
					if(mysqli_num_rows($query) > 0){
						while($row = mysqli_fetch_array($query)){
							$zone_name = $row['zone_name'];
							$zone_description = $row['zone_description'];
						echo "<h1 class='text-left'>" . $row['zone_name'] . "</h1>";
						}
					}
					?>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. Use this screen to create a new zone.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_update_zone.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Zone Name</label>
							<?php echo"<input name='zone_name' class='form-control' id='zone_name' placeholder='$zone_name' value='$zone_name' type='text'></input>"; ?>
						</div>
						<div class="form-group">
							<label>Zone Description</label>
							<?php echo"<input name='zone_description' class='form-control' id='zone_description' placeholder='$zone_description' value='$zone_description' type='text'></input>"; ?>
						</div>
						<button class="btn btn-primary" name="update_zone" type="submit" id="submit_button" value="Submit">Submit</button>
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