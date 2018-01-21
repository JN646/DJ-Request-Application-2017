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
<head>
	<title>DEBUG</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">DEBUG</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>This is a debug page. Used to provide system information for feedback and testing.</p>
					<?php
						// Get the User Agent.
						echo $_SERVER['HTTP_USER_AGENT'];
						
						// Check for IE and IE11 - Trident based or Edge.
						if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE ||
							strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
							
							// Using IE.
							echo 'You are using Internet Explorer.<br />';
						}
						
						if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') !== FALSE) {
							
							// Using Edge.
							echo 'You are using Edge.<br />';
						}
					?>
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