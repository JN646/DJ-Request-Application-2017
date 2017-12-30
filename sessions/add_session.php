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
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Session</h1>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. Use this screen to create a new zone.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_add_session.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Session Name</label>
							<input name="session_name" class="form-control" placeholder="Session Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Session Description</label>
							<input name="session_description" class="form-control" placeholder="Session Description" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_session" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>