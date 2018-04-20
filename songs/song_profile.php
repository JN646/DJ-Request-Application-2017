<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171231
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");

// User Account
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	// header("location: http://localhost/djx/djx/accounts/login.php");
	// exit;
}

// Get song_id from URL.
$UID = (int)$_GET["song_id"];

// Attempt select query execution
$sql_songs = "SELECT * FROM songs WHERE song_id='$UID'";
$result = mysqli_query($mysqli, $sql_songs);
$rs = mysqli_fetch_array($result);

// Assign Variables.
$Song_Name = $rs['song_name'];
$Song_Artist = $rs['song_artist'];
$Song_Album = $rs['song_album'];

?>
<head>
	<?php echo"<title>$Song_Name - $Song_Artist</title>"; ?>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<div class="row">
						<div class="col-md-12">
							<div class="jumbotron jumbotron-fluid">
								<?php
								echo"<div class='col-md-12 border'>";
									echo"<div class='row'>";
										echo"<div class='col-md-8'>";
											echo"<h1 class='display-4 text-center'>$Song_Name</h1>";
											echo"<h1 class='text-center'>$Song_Artist</h1>";
											echo"<div class='col-md-4' style='margin: 0 auto;'>";
												echo"<h4 class='text-center btn-link' style='padding:10px'><a href='#'>Request</a></h4>";
											echo"</div>";
										echo"</div>";
										echo"<div class='col-md-4'>";
											echo"<div class='col-md-2'>";
												echo "<div class-'col-md-12 border'>";
													echo "<a href='../requests/functions/func_add_request.php?song_id=" .$UID. "'><img class='card-img-top' style='width: 250px;' onerror=this.src='../images/250x250.png' src=\"";
													echo LastFMArtwork::getArtwork($Song_Artist,$Song_Album, true, "large");
													echo "\"></a>";
												echo "</div>";
											echo"</div>";
										echo"</div>";
									echo"</div>";
								echo"</div>";
								?>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-12 border">
								<h2>Related Artists</h2>
								<p>Coming Soon<p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12 border">
								<h2>Related Tracks</h2>
								<?php
								// Attempt select query execution
								$sql = "SELECT * FROM songs
										WHERE song_artist LIKE '%$Song_Artist%'";
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
												echo "<td class='text-center'><a href=../requests/functions/func_add_request.php?song_id=" . $row['song_id'] . ">Request</a></td>";
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
							</div>
						</div>
					</div>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
