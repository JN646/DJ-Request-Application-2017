<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171223
*/
// Include config files
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Song Import</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Import</h1>
					<p class="alert alert-warning">Please ensure that the data appears in the correct columns prior to import</p>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<div class="row">
					<?php
					//Open the file.
					$fileHandle = fopen("http://localhost/djx/djx/data/data.csv", "r");
					 
					//Loop through the CSV rows.
					echo "<table class='table'>";
						echo "<tr>";
							echo "<th>Song Name</th>";
							echo "<th>Song Artist</th>";
							echo "<th>Song Album</th>";
							echo "<th>Song Genre</th>";
							echo "<th>Song Year</th>";
						echo "</tr>";
					while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
						echo "<tr>";
							echo "<td>" . $row[0] . "</td>";
							echo "<td>" . $row[1] . "</td>";
							echo "<td>" . $row[2] . "</td>";
							echo "<td>" . $row[3] . "</td>";
							echo "<td>" . $row[4] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					fclose($fileHandle); //Close the file.
					?>
					</div>
					<hr>
					<form class="form-group">
						<button class="btn btn-success">Import</button>
					</form>
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