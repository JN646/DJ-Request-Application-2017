<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
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
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<div class="row">
					<?php
					//get the csv file
					$f_pointer=fopen("http://localhost/djx/djx/data/data.csv","r"); // file pointer

					while(! feof($f_pointer)){
					$ar=fgetcsv($f_pointer);
					$sql="INSERT INTO songs(song_name,song_artist,song_album,song_genre,song_year)values('$ar[0]','$ar[1]','$ar[2]','$ar[3]','$ar[4]')";
					echo $sql;
					echo "<br>";
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