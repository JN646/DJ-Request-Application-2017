<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171211
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");
?>
<head>
	<title>Song Search</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<?php echo "<h1 class='display-4'>Results for $_GET[search_val]</h1>"; ?>
					<br>
					<form action="songs/search_song.php" method="get">
						<div class="form-inline">
							<input name="search_val" type="text" placeholder="Search" class="form-control" style="width: 60%"></input>
							<button class="form-control btn btn-primary" name="SearchButton" value="search" type="submit">Search</button>
						</div>
					</form>
					<?php
						// Attempt select query execution
						$sql = "SELECT * FROM songs
								WHERE song_name LIKE '%$_GET[search_val]%'
								OR song_artist LIKE '%$_GET[search_val]%'
								OR song_year LIKE '%$_GET[search_val]%'
								OR song_genre LIKE '%$_GET[search_val]%' ";
						if($result = mysqli_query($mysqli, $sql)){
							if(mysqli_num_rows($result) > 0){
								echo "<table class='table table-bordered'>";
									echo "<tr>";
										echo "<th width='48px'>Cover</th>";
										echo "<th>Song</th>";
										echo "<th>Artist</th>";
										echo "<th>Year</th>";
										echo "<th>Genre</th>";
										echo "<th>Request</th>";
									echo "</tr>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td><img class='card-img-top' onerror=this.src='images/250x250.png' src=\"";
										echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "small");
										echo "\"></td>";
										echo "<td>" . $row['song_name'] . "</td>";
										echo "<td>" . $row['song_artist'] . "</td>";
										echo "<td>" . $row['song_year'] . "</td>";
										echo "<td>" . $row['song_genre'] . "</td>";
										echo "<td><a href=functions/update_count.php?song_id=".$row['song_id'].">Request</a></td>";
									echo "</tr>";
								}
								echo "</table>";
								// Free result set
								mysqli_free_result($result);
							} else{
								echo "No songs were found.";
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