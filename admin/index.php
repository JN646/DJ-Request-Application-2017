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
	<title>Dashboard</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Dashboard</h1>
					<p>DJ control panel.</p>
					<!-- Tools -->
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-12 border">
								<h3>Session Details</h3>
								<ul>
									<li><a href="#">Session Name</a></li>
									<li><a href="#">Session Create</a></li>
									<li><a href="#">Session End</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 border">
								<h3>Songs</h3>
								<ul>
									<li><a href="#">Song Home</a></li>
									<li><a href="#">Song Add</a></li>
									<li><a href="#">Song List</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 border">
								<h3>Clients</h3>
								<ul>
									<li><a href="#">Client Home</a></li>
									<li><a href="#">Client Add</a></li>
									<li><a href="#">Client List</a></li>
								</ul>
							</div>
						</div>
					</div> <!-- Close row -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>