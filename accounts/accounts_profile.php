<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	180119
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}

// Test Data
$username = "";
$password = "";
$newpassword = "";
$djname = "";
?>
<head>
	<title>Profile</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Profile</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>Change your account details.</p>
					<form action="<?php echo $environment; ?>#" method="post" class="col-md-4">
						<div class="form-group">
							<label>Username</label>
							<?php echo"<input name='username' class='form-control' id='username' placeholder='$username' value='$username' type='text'></input>"; ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<?php echo"<input name='password' class='form-control' id='password' placeholder='$password' value='$password' type='text'></input>"; ?>
						</div>
						<div class="form-group">
							<label>New Password</label>
							<?php echo"<input name='newpassword' class='form-control' id='newpassword' placeholder='$newpassword' value='$newpassword' type='text'></input>"; ?>
						</div>
						<div class="form-group">
							<label>New Password</label>
							<?php echo"<input name='newpassword' class='form-control' id='newpassword' placeholder='$newpassword' value='$newpassword' type='text'></input>"; ?>
						</div>
						<button class="btn btn-primary" name="update_zone" type="submit" id="submit_button" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>