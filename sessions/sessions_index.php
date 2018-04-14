<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171230
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
	<title>User List</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Session List</h1>
					<p>See and edit active sessions.</p>
					<p><a href='add_session.php'>Add Session</a></p>
					<?php
					//get the list of zones
					$terms = "SELECT * FROM sessions";
					$result = mysqli_query($mysqli,$terms);

					echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<th class='text-center'>Session ID</th>";
						echo "<th class='text-center'>User ID</th>";
						echo "<th class='text-center'>Session Name</th>";
						echo "<th class='text-center'>Playlist ID</th>";
						echo "<th class='text-center'>Session Active?</th>";
						echo "<th class='text-center'>Edit Zones</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td class='text-center'>".$row['session_id']."</td>";
							echo "<td>".$row['user_id']."</td>";
							echo "<td>".$row['session_name']."</td>";
							echo "<td>".$row['playlist']."</td>";
							echo "<td class='text-center'>".$row['session_active']."</td>";
							echo "<td class='text-center'><a href=sessions_edit_zones.php?session_id=".$row['session_id'].">Edit Zones</a></td>";
						echo "</tr>";
					}
					echo "</table>";
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
