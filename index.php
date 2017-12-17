<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");
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
						<div class="row">
							<div class="col-md-8">
								<h1 class="display-2 text-center">Venue Name</h1>
								<h1 class="lead text-center">DJ Request System</h1>
							</div>
							<div class="col-md-4">
								<div class="col-md-12 border border-primary" style="height: 150px">
								<p>Some sort of side content is displayed here.</p>
								</div>
							</div>
						</div>
					</div>
					<form action="songs/search_song.php" method="get">
						<div class="form-inline">
							<input name="search_val" type="text" placeholder="Search" class="form-control" style="width: 60%"></input>
							<button class="form-control btn btn-primary" name="SearchButton" value="search" type="submit">Search</button>
						</div>
					</form>
					<br>
					<div class="row">
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM songs ORDER BY RAND () ASC LIMIT 12";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								echo"<div class='col-md-2'>";
									echo "<div class-'col-md-12 border' border-primary>";
									echo "<img class='card-img-top' src=\"";
									echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
									echo "\">";
									echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
									echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
									echo"<p class='text-center'><a href=functions/update_count.php?song_id=" .$row['song_id']. ">Request</a></p>";
									echo "</div>";
								echo"</div>";
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
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>