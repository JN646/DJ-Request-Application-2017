<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Song Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Requests</h1>
					<p>All your active requests this session.</p>
					<?php
					$sql = "SELECT * FROM requests WHERE request_active = 1 ORDER BY request_time DESC";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th>Request ID</th>";
									echo "<th>Request Time</th>";
									echo "<th>Request Song ID</th>";
									echo "<th>Request Session ID</th>";
									echo "<th>Delete</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['request_id'] . "</td>";
									echo "<td>" . $row['request_time'] . "</td>";
									echo "<td>" . $row['request_song_id'] . "</td>";
									echo "<td>" . $row['request_session_id'] . "</td>";
									echo "<td><a href=functions/func_request_inactive.php?request_id=".$row['request_id']." class='btn btn-danger'>Delete</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							// Free result set
							mysqli_free_result($result);
						} else{
							echo "No requests were found.";
						}
					} else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
					}
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>