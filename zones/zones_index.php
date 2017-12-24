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
	<title>Zone Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Zone Management</h1>
					<ul class="nav">
						<li class="nav-item"><a href="add_zone.php"><img src="<?php echo $environment; ?>images/add.png" style="width: 32px"></a></li>
					</ul>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. When a device moves, or a DJ changes room, it is important to adjust the zone that they are working in. This will ensure that all requests go to the correct place.</p>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM zones";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th class='text-center'>Zone Name</th>";
									echo "<th class='text-center'>Zone Description</th>";
									echo "<th class='text-center'>View</th>";
									echo "<th class='text-center'>Delete</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['zone_name'] . "</td>";
									echo "<td>" . $row['zone_description'] . "</td>";
									echo "<td class='text-center'><a href=view_zone.php?zone_id=".$row['zone_id'].">View</a></td>";
									echo "<td class='text-center'><a href=functions/func_delete_zone.php?zone_id=".$row['zone_id']." class='btn btn-danger'>Delete</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							// Free result set
							mysqli_free_result($result);
						} else{
							echo "No zones were found.";
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
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>