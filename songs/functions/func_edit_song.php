<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config files
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Template</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Edit Template</h1>
					<p>Default edit text goes here.</p>
					<?php
					$UID = (int)$_GET["song_id"];
					$query = mysql_query("SELECT * FROM songs WHERE song_id = '$UID'");
					
					if(mysql_num_rows($query)>=1) {
						while($row = mysql_fetch_array($query)) {
							$song_name = $row['song_name'];
							$artist = $row['song_artist'];
							$album = $row['song_album'];
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
					} else {
						echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
					}
					?>
					
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>