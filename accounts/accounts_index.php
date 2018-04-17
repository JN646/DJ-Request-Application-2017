<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171216
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

// Initialise the session
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	
	// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}
?>
<!-- Header Content -->
<head>
	<title>Accounts Home</title>
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
					<h1 class="display-4">Accounts Home</h1>
					<p>Control your user accounts and the roles that they have.</p>
					<ul>
						<li><a href="<?php echo $environment; ?>accounts/register.php">Create Accounts</a></li>
						<li><a href="<?php echo $environment; ?>accounts/accounts_profile.php">Profile</a></li>
						<li><a href="<?php echo $environment; ?>accounts/user_list.php">User List</a></li>
					</ul>

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
