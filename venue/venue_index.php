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
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}
?>
<head>
	<title>Venue Config</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Venue Config</h1>
					<ul class="nav">
						<li class="nav-item"><a class="nav-link" href="venue_index.php">Config</a></li>
						<li class="nav-item"><a class="nav-link" href="venue_css.php">CSS</a></li>
					</ul>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>Use this page to update settings about your venue. Make changes to the config file to load personalised changes to your system.</p>
					<?php
					// Read a file.
					function Read() {
						$file = "../config/DBVar.php";
						$fp = fopen($file, "r");
						echo file_get_contents( $file);
					}

					// Write to a file.
					function Write() {
						$file = "../config/DBVar.php";
						$fp = fopen($file, "w");
						$data = $_POST["tekst"];
						fwrite($fp, $data);
						fclose($fp);
					}

					// Run the write function.
					if ($_POST["submit_check"]){
						Write();
					};
					?>  

					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
						<textarea name="tekst" style="width: 100%; height: 400px;"><?php Read(); ?></textarea><br>
						<input type="submit" name="submit" value="Update text">
						<input type="hidden" name="submit_check" value="1">
					</form>

					<?php
					// File Updated message.
					if ($_POST["submit_check"]){
						echo 'Text updated';
					};
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