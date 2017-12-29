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
					<h1 class="display-4">Add Client</h1>
					<form action="<?php echo $environment; ?>clients/functions/func_add_client.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Client Name</label>
							<input name="client_name" class="form-control" placeholder="Client Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Client Description</label>
							<input name="client_description" class="form-control" placeholder="Client Description" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_client" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>