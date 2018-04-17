<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	180114
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<!-- Header Content -->
<head>
	<title>Template</title>
</head>

<!-- Body -->
<body>

	<!-- Container -->
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">

				<!-- Navigation -->
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>

				<!-- Main Block -->
				<div class="col-md-11">
					<br>

					<!-- Title -->
					<h1 class="display-4">Template</h1>

					<!-- Status Bar -->
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>Default text goes here.</p>

					<!-- Close Divs -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->

<!-- Scripts -->
<script>
// hide status bar
$('#status_bar').hide();
</script>

<!-- Footer -->
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>
