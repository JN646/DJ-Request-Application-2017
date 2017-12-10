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
	<title>Help</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Help</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu justo quis mauris auctor auctor. Vestibulum id ultricies massa. Cras in eros elementum, tristique dui ac, viverra mauris. Pellentesque nunc magna, lacinia nec nibh non, tempor dictum sapien. Proin mollis suscipit lacus. Curabitur ex tortor, sagittis at pulvinar quis, suscipit sed sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis vehicula malesuada massa. Aenean ut augue magna. In volutpat commodo nulla, ac accumsan lorem sollicitudin nec. Phasellus egestas porttitor enim, ac sodales tortor egestas eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi urna lorem, fringilla ut turpis eget, efficitur pellentesque orci.</p>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>