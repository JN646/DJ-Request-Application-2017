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
	<title>Client Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Client Management</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<h1 class="col-md-6 alert alert-warning">Current Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?></h1>
					<p>Use the client manager to manage your physical devices.</p>
					<ul class="nav">
						<li class="nav-item"><a href="add_client.php"><img src="<?php echo $environment; ?>images/add.png" style="width: 32px"></a></li>
					</ul>
					<br>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM clients";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th class='text-center'>Client Name</th>";
									echo "<th class='text-center'>Client MAC Address</th>";
									echo "<th class='text-center'>Client Description</th>";
									echo "<th class='text-center'>Client Zone</th>";
									echo "<th class='text-center'>View</th>";
									echo "<th class='text-center'>Delete</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['client_name'] . "</td>";
									echo "<td>" . $row['Client_Mac'] . "</td>";
									echo "<td>" . $row['client_description'] . "</td>";
									echo "<td></td>";
									echo "<td class='text-center'><a href=functions/update_count.php?song_id=".$row['client_id'].">View</a></td>";
									echo "<td class='text-center'><a href=functions/func_delete_client.php?client_id=".$row['client_id']." class='btn btn-danger'>Delete</a></td>";
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
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>