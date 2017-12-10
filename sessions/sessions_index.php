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
	<title>Session Home</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Session Home</h1>
					<p>A session is a clearly defined music event. Once a session has been created the VIP guests will be able to send requests to it. Once the session has finished it needs to be destroyed.</p>
					<ul>
						<li><a href="#">Session Name</a></li>
						<li><a href="#">Session Start</a></li>
						<li><a href="#">Session End</a></li>
					</ul>
					<hr>
					<h2>Session Create</h2>
					<form action="#" method="post">
						<div class="form-group">
							<label>Session Name</label>
							<input type="text" name="Session_Name" placeholder="Session Name"></input>
							<button type="button" name="session_start" value="session_start">Start</button>
							<button type="button" name="session_end" value="session_end">Start</button>
						</div>
					</form>
					<hr>
					<h2>Running Sessions</h2>
					<p>[Session Name] - [Session Start Time] - <button>End</button></p>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>