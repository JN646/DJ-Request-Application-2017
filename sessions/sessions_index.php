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
	<title>Sessions</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Sessions</h1>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<p>A session is a clearly defined music event. Once a session has been created the VIP guests will be able to send requests to it. Once the session has finished it needs to be destroyed.</p>
					<hr>
					<h2>Start a Session</h2>
					<p>Choose a name for the session and choose the DJ to assign this session to.</p>
					<form action="<?php echo $environment; ?>sessions/functions/func_add_session.php" method="post">
						<div class="form-inline">
							<input name="session_name" class="form-control" placeholder="Session Name" type="text"></input>
							<select class="form-control">
								<option>DJ 1</option>
								<option>DJ 2</option>
								<option>DJ 3</option>
								<option>DJ 4</option>
								<option>DJ 5</option>
							</select>
							<button class="btn btn-success" name="add_session" type="submit" value="Submit">Submit</button>
						</div>
					</form>
					<hr>
					<h2>Running Sessions</h2>
					<?php
					// Attempt select query execution
					$sql = "SELECT * FROM sessions";
					if($result = mysqli_query($mysqli, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo "<table class='table'>";
								echo "<tr>";
									echo "<th>Session Name</th>";
									echo "<th>Session Start</th>";
									echo "<th>Song End</th>";
								echo "</tr>";
							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
									echo "<td>" . $row['session_name'] . "</td>";
									echo "<td>" . $row['session_start'] . "</td>";
									echo "<td><button class='form-control btn btn-danger'>End</button></td>";
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