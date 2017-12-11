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
	<title>DJ App</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<div class="jumbotron">
						<h1 class="display-3">DJ App</h1>
						<h1 class="lead">DJ Request System</h1>
					</div>
					<form action="" method="post">
						<div class="form-group">
							<input name="search" type="text" placeholder="Search"></input>
							<button name="SearchButton" value="search" type="submit">Search</button>
						</div>
					</form>
					<div class="row">
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM songs LIMIT 12";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								echo "<div class='col-md-2' style='height: 250px'>";
									echo "<div class='col-md-12 border' style='height: 200px'>";
										echo "<br><h3 class='text-center'>" . $row['song_name'] . "</h3>";
										echo "<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
										echo "<p class='text-center'>" . $row['song_year'] . "</p>";
										echo "<p class='text-center'><a href=functions/update_count.php?song_id=".$row['song_id'].">Request</a></p>";
									echo "</div>";
								echo "</div>";
							}
							// Free result set
							mysqli_free_result($result);
						} else{
							echo "<p class='text-center'>No songs were found.</p>";
						}
					} else{
						echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
					}
					?>
					</div>
 					<?php
/* 					// Attempt select query execution
					$sql = "SELECT * FROM songs LIMIT 10";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table table-bordered'>";
								echo "<tr>";
									echo "<th>Song</th>";
									echo "<th>Artist</th>";
									echo "<th>Genre</th>";
									echo "<th>Year</th>";
									echo "<th>Request</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['song_name'] . "</td>";
									echo "<td>" . $row['song_artist'] . "</td>";
									echo "<td align='center'>" . $row['song_genre'] . "</td>";
									echo "<td align='center'>" . $row['song_year'] . "</td>";
									echo "<td><a href=functions/update_count.php?song_id=".$row['song_id'].">Request</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							// Free result set
							mysqli_free_result($result);
						} else{
							echo "<p class='text-center'>No songs were found.</p>";
						}
					} else{
						echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
					} */
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>