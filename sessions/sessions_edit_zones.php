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
					<h1 class="display-4">Edit Zones</h1>
					<p>Assign zones to a session.</p>
					<?php
					//get the list of zones
					$terms = "SELECT * FROM zones";
					$result = mysqli_query($mysqli,$terms);

					echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<th class='text-center'>Name</th>";
						echo "<th class='text-center'>Description</th>";
						echo "<th class='text-center'>Session Service</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>".$row['zone_name']."</td>";
						echo "<td>".$row['zone_description']."</td>";
						echo "<td><input type='checkBox' name=".$row['zone_id']." value='true'></td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
					<hr>
					<button class='btn btn-primary'>Update</button>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>