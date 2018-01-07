<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>
<head>
	<title>Song Request</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-12">
					<br>
					<div class="jumbotron jumbo-header" id="header">
						<div class="row">
							<div class="col-md-9">
								<?php
								echo"<h1 class='display-2 text-center'>$VenueName</h1>";
								echo"<h1 class='lead text-center'>$VenueSlogan</h1>";
								// <form class="form-inline">
									// <button class="form-control btn btn-primary">Start Browsing</button>
								// </form>
								?>
							</div>
							<div class="col-md-3 jumbo-aside">
								<div class="col-md-12" style="height: 150px">
								<p>Thank You for choosing the private area of our club. As a VIP you can use these devices to request songs straight to the DJ.</p>
								</div>
							</div>
						</div>
					</div>
					<form class="form-inline my-2 my-lg-0" action="songs/search_song.php" method="get">
						<div class="form-inline">
							<input name="search_val" type="text" placeholder="Search" class="form-control mr-sm-2"></input>
							<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit">Search</button>
						</div>
					</form>
					<br>
					<div class="row">
					<script>
					$( document ).ready(function() {
						$("#header").fadeIn('slow');
						$("#song_block").fadeIn('slow');
					});
					</script>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM songs WHERE song_album <> '' ORDER BY RAND () ASC LIMIT 12";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								echo"<div class='col-md-2' id='song_block'>";
									echo "<div class-'col-md-12 border' border-primary>";
										echo "<a href='requests/functions/func_add_request.php?song_id=" .$row['song_id']. "'><img class='card-img-top' onerror=this.src='images/250x250.png' src=\"";
										echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
										echo "\"></a>";
										echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
										echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
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