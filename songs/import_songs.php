<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>
<head>
	<title>Import Songs</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Import Songs</h1>
					<p>Use this form to upload your song library. The currently supported formats are:</p>
					<ul>
						<li>CSV</li>
						<li>XML</li>
					</ul>
					<form action="functions/func_import_songs.php" class="form-inline">
						<button class="form-control btn btn-primary">Import</button>
					</form>
					<hr>
					<?php
					
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>