<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	session_start();															// Initialise the session
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
		header("location: http://localhost/djx/djx/accounts/login.php");
		exit;
	}
?>
<head>
	<title>Sessions</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php
				include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php");
				
				//get the active user ID
				$uname = $_SESSION['username'];
				$terms = "SELECT id FROM users WHERE username = '$uname'";
				$result = mysqli_query($mysqli,$terms);
				$rs = mysqli_fetch_array($result);
				$userid = (int)$rs['id'];
				?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Sessions</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>A session is a clearly defined music event that has a playlist and can serve multiple zones. Once a session has been created, the VIP guests will be able to send requests via its active zones.</p>
					<hr>
					<h2>Create a New Session</h2>
					<form action="<?php echo $environment; ?>sessions/functions/func_add_session.php" method="post">
						<input type="hidden" name="user_id" value="<?=$userid;?>">
						<div class="form-group col-md-6">
							<label>Session Name</label>
							<input name="session_name" class="form-control" placeholder="Session Name" type="text"></input>
							<br>
							<label>Zones</label>
							<p>This doesn't do anything yet.</p>
							<?php
							//get the list of zones
							$terms = "SELECT * FROM zones";
							$result = mysqli_query($mysqli,$terms);
							
							echo "<table class='table'>";
							echo "<tr>";
								echo "<th>Name</th>";
								echo "<th>Description</th>";
								echo "<th>Session Service</th>";
							echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['zone_name']."</td>";
								echo "<td>".$row['zone_description']."</td>";
								echo "<td><input type='checkBox' name=".$row['zone_id']." value='true'></td>";
								echo "</tr>";
							}
							echo "</table>";
							?>
							<input type="hidden" name="zone_info"></input>
							<br>
							<label>playlist id</label>
							<input name="playlist_id" class="form-control" placeholder="placeholder until playlists implemented"></input>
							<br>
							<button class="btn btn-success" name="add_session" type="submit" value="Submit">Submit</button>
						</div>
					</form>
					<hr>
					<h2>Existing Sessions</h2>
					<div class="col-md-12">
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM sessions";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table'>";
								echo "<tr>";
									echo "<th>Name</th>";
									echo "<th>DJ</th>";
									echo "<th>Zones</th>";
									echo "<th>Playlist</th>";
									echo "<th width='10%'></th>";
									echo "<th width='10%'></th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['session_name'] . "</td>";
									echo "<td>" . $row['user_ID'] . "</td>";
									echo "<td>" . $row['zone_info'] . "</td>";
									echo "<td>" . $row['playlist'] . "</td>"; //get the name from the playlist table
									echo "<td><button class='btn btn-primary'>Edit</button></td>";
									echo "<td><button class='btn btn-danger'>Delete</button></td>";
								echo "</tr>";
							}
							// Free result set
							echo "</table>";
							mysqli_free_result($result);
						} else{
							echo "<p>No sessions were found.</p>";
							echo '<a href="javascript:history.back()">Go back</a>';
						}
					} else{
						echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
						echo '<a href="javascript:history.back()">Go back</a>';
					}
					?>
					</div>
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