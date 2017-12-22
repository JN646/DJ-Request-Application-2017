<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171222
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Edit Song</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<?php
					$artist = "Edit " . urldecode($_GET['song_id']);
					echo "<h1 class='display-4'>$artist</h1>";
					?>
					<p>Default edit text goes here.</p>
					<?php
					$UID = (int)$_GET["song_id"];
					$query = mysqli_query("SELECT * FROM songs WHERE song_id = '$UID'");
					
					if($query = mysqli_query($mysqli, $query)){
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								$song_name = $row['song_name'];
								$artist = $row['song_artist'];
								$album = $row['song_album'];
							}
							// Free query set
							mysqli_free_result($query);
						} else{
							echo "<p>No songs were found.</p>";
							echo '<a href="javascript:history.back()">Go back</a>';
						}
					} else{
						echo "ERROR: Not able to execute $query. " . mysqli_error($mysqli);
						echo '<a href="javascript:history.back()">Go back</a>';
					}
					?>
					<h2>Form:</h2>
					<form action="update.php" method="post">
						<input type="hidden" name="ID" value="<?=$UID;?>">
						Song Name: <input type="text" name="song_name" value="<?=$song_name?>"><br>
						Artist: <input type="text" name="artist" value="<?=$artist?>"><br>
						Album: <input type="text" name="album" value="<?=$album?>"><br>
						<input type="Submit">
					</form>
					<?php
					// } else {
						// echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
					// }
					?>
					
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>