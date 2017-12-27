<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/requests/functions/func_time_ago.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}
?>
<head>
	<title>My Requests</title>
	<meta http-equiv="Refresh" content="5">
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">My Requests</h1>
					<p>All your active requests this session.</p>
					<?php

					$songterms = "SELECT songs.song_name, songs.song_artist, songs.song_year, requests.request_time, requests.request_active, requests.request_id, requests.request_pinned
					FROM songs
					INNER JOIN requests
					ON songs.song_id = requests.request_song_id
					
					ORDER BY request_pinned DESC, request_time DESC
					";
					$result = mysqli_query($mysqli, $songterms);

					echo "<table class='table table-bordered'>";
					echo "<tr>";
						echo "<th class='text-center'>Requested at</th>";
						echo "<th class='text-center'>Song</th>";
						echo "<th class='text-center'>Artist</th>";
						echo "<th class='text-center'>Year</th>";
						echo "<th class='text-center'>Pin</th>";
						echo "<th class='text-center'>Delete</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".xTimeAgo(time(), strtotime($row['request_time']), "x")."</td>";
							echo "<td>".$row['song_name']."</td>";
							echo "<td>".$row['song_artist']."</td>";
							echo "<td class='text-center'>".$row['song_year']."</td>";
							if($row['request_pinned'] == 0) {
								echo "<td class='text-center'><a href=functions/func_request_pin.php?request_id=".$row['request_id']." class='btn btn-primary'>Pin</a></td>";
							}
							if($row['request_pinned'] == 1) {
								echo "<td class='text-center'><a href=functions/func_request_pin.php?request_id=".$row['request_id']." class='btn btn-success'>Unpin</a></td>";
							}
							echo "<td class='text-center'><a href=functions/func_request_inactive.php?request_id=".$row['request_id']." class='btn btn-danger'>Delete</a></td>";
						echo "</tr>";
					}
					echo "</table>";
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>