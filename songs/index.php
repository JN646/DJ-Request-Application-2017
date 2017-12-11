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
	<title>Song Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Management</h1>
					<div class="row">
						<div class="col-md-2">
							<div class="col-md-12 border" style="height: 150px">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/list_song.php">Song List</a></h3>
							</div>
						</div>
						<div class="col-md-2">
							<div class="col-md-12 border" style="height: 150px">
								<h3 class="text-center"><a href="<?php echo $environment; ?>songs/add_song.php">Add Song</a></h3>
							</div>
						</div>
					</div>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>