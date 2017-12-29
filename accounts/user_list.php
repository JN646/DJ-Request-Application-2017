<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171229
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
					<h1 class="display-4">User List</h1>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM users";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th class='text-center'>Username</th>";
									echo "<th class='text-center'>Password (DEBUG)</th>";
									echo "<th class='text-center'>DJ Name</th>";
									echo "<th class='text-center'>Created At</th>";
									echo "<th class='text-center'>Current Session ID</th>";
									echo "<th class='text-center'>Admin?</th>";
									echo "<th class='text-center'>View</th>";
									echo "<th class='text-center'>Delete</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									// Mark admin.
									if($row['is_admin'] == 1) {
										echo "<td style='color: red;'>" . $row['username'] . "</td>";
									} else {
										echo "<td style='color: black;'>" . $row['username'] . "</td>";								
									}
									echo "<td>" . $row['password'] . "</td>";
									echo "<td>" . $row['djname'] . "</td>";
									echo "<td>" . $row['created_at'] . "</td>";
									// Looks for null values.
									if($row['current_session_id'] == NULL) {
										echo "<td class='text-center'>NONE</td>";
									} else {
										echo "<td class='text-center'>" . $row['current_session_id'] . "</td>";										
									}
									// Looks for admin value.
									if($row['is_admin'] == 1) {
										echo "<td class='text-center'>Yes</td>";
									} else {
										echo "<td class='text-center'></td>";										
									}
									echo "<td class='text-center'><a href=functions/#?song_id=".$row['id'].">View</a></td>";
									echo "<td class='text-center'><a href=functions/#?client_id=".$row['id']." class='btn btn-danger'>Delete</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							// Free result set
							mysqli_free_result($result);
						} else{
							echo "No clients were found.";
						}
					} else{
						echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
					}
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>