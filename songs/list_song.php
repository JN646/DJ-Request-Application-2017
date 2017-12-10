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
	<title>Song List</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song List</h1>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM songs";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th>Song</th>";
									echo "<th>Artist</th>";
									echo "<th>Genre</th>";
									echo "<th>Year</th>";
									echo "<th>Delete</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['song_name'] . "</td>";
									echo "<td>" . $row['song_artist'] . "</td>";
									echo "<td align='center'>" . $row['song_genre'] . "</td>";
									echo "<td align='center'>" . $row['song_year'] . "</td>";
									echo "<td><a href=functions/update_count.php?song_id=".$row['song_id'].">Delete</a></td>";
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