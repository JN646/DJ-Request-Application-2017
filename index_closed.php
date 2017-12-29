<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171228
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css">
	<title>Kiosk is Closed</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php echo"<a class='navbar-brand' href=#>$VenueName</a>"; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  </div>
</nav>
<body>
	<div class="fluid-container">
		<br>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron jumbo-header">
						<br>
						<h1 class="display-1 text-center">Closed</h1>
						<h1 class="text-center">This kiosk is currently closed.</h1>
						<h3 class="text-center">A session will start shortly.</h3>
					</div> 
				</div> <!-- Close col-md-12 -->
			</div> <!-- Close row -->
		</div>
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>