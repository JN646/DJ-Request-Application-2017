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
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
}
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
					<?php echo "<h1 class='display-4'>Results for '$_GET[search_val]'</h1>"; ?>
					<br>
					<form class="form-inline my-2 my-lg-0" action="search_song.php" method="get">
						<div class="form-inline">
							<input name="search_val" id="txtSearch" type="text" placeholder="Search" class="form-control mr-sm-2" style="width: 60%"></input>
							<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit">Search</button>
						</div>
					</form>
					<br>
					<script>
					$(document).ready(function() {
						$('#txtSearch').width(500);
						$('#txtSearch').focus(function() {
							$(this).animate({
								width: 750
							})
						});
						$('#txtSearch').blur(function() {
							$(this).animate({
								width: 500
							})
						});
					});
					</script>
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
										echo "<th class='text-center' width='64px'></th>";
										echo "<th class='text-center'>Song</th>";
										echo "<th class='text-center'>Artist</th>";
										echo "<th class='text-center'>Year</th>";
										echo "<th class='text-center'>Genre</th>";
										echo "<th class='text-center'>Request</th>";
									echo "</tr>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td><img class='card-img-top' onerror=this.src='../images/250x250.png' src=\"";
										echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "small");
										echo "\"></td>";
										echo "<td><a href='song_profile.php?song_id=" .$row['song_id']. "'>" . $row['song_name'] . "</a></td>";
										echo "<td>" . $row['song_artist'] . "</td>";
										echo "<td class='text-center'>" . $row['song_year'] . "</td>";
										echo "<td class='text-center'>" . $row['song_genre'] . "</td>";
										echo "<td class='text-center'><a href=functions/update_count.php?song_id=".$row['song_id'].">Request</a></td>";
									echo "</tr>";
								}
								echo "</table>";
								// Free result set
								mysqli_free_result($result);
							} else{
								echo "No songs were found. Todo: list other suggestions?";
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