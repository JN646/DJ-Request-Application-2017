<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171220
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}

$zname = "SELECT * FROM zones WHERE zone_id='%$_GET[zone_id]%'";
$result = mysqli_query($mysqli, $zname);
$rs = mysqli_fetch_array($result);
echo $rs;
$zone_name = $rs['zone_name'];
?>
<head>
	<title>View Zone</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">View Zone</h1>
					<?php
					$UID = (int)$_GET["zone_id"];
					$terms = "SELECT * FROM zones WHERE zone_id = '$UID'";
					$query = mysqli_query($mysqli, $terms);
					if(mysqli_num_rows($query) > 0){
						while($row = mysqli_fetch_array($query)){
							$zone_name = $row['zone_name'];
							$zone_description = $row['zone_description'];
						echo "<h1 class='text-left'>" . $row['zone_name'] . "</h1>";
						}
					}
					?>
					<p>Zones are physical spaces that DJs and Devices can be assigned to. These can be rooms, floors or areas of your venue. Use this screen to create a new zone.</p>
					<form action="<?php echo $environment; ?>zones/functions/func_update_zone.php" method="post" class="col-md-4">
						<div class="form-group">
							<label>Zone Name</label>
							<?php echo"<input name='zone_name' class='form-control' placeholder='$zone_name' value='$zone_name' type='text'></input>"; ?>
						</div>
						<div class="form-group">
							<label>Zone Description</label>
							<?php echo"<input name='zone_description' class='form-control' placeholder='$zone_description' type='text'></input>"; ?>
						</div>
						<button class="btn btn-primary" name="update_zone" type="submit" value="Submit">Submit</button>
					</form>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>