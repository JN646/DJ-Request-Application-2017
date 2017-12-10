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
	<title>Add Song</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Add Zone</h1>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. Use this screen to create a new zone.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_add_zone.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Zone Name</label>
							<input name="zone_name" class="form-control" placeholder="Zone Name" type="text"></input>
						</div>
						<div class="form-group">
							<label>Zone Description</label>
							<input name="zone_description" class="form-control" placeholder="Zone Description" type="text"></input>
						</div>
						<button class="btn btn-primary" name="add_zone" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>