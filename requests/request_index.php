<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/requests/functions/func_time_ago.php");
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	header("location: http://localhost/djx/djx/accounts/login.php");
	exit;
}
?>
<head>
	<title>My Requests</title>
	<!-- <meta http-equiv="Refresh" content="5"> -->
	<script src="<?php echo $environment; ?>js/sort_table.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">My Requests</h1>
					<div class="alert alert-warning">This page is partially implemented</div>
					<div id="status_bar" class="alert alert-warning" role="alert">Please wait while the page loads.</div>
					<p>All your active requests this session.</p>
					<nav class="nav">
						<a class="nav-link disabled" href="#">Delete All</a>
						<a class="nav-link disabled" href="#">Unpin All</a>
						<a class="nav-link font-button plus">A+</a>
						<a class="nav-link font-button minus">A-</a>
					</nav>
					<?php
					$songterms = "SELECT songs.song_name, songs.song_artist, songs.song_year, requests.request_time, requests.request_active, requests.request_id, requests.request_pinned
					FROM songs
					INNER JOIN requests
					ON songs.song_id = requests.request_song_id
					ORDER BY request_pinned DESC, request_time DESC
					";
					$result = mysqli_query($mysqli, $songterms);
					echo "<table class='table table-bordered' style='font-size: 120%;' id='myTable2'>";
					echo "<tr>";
						echo "<th onclick='sortTable(0)' class='text-center'><input id='select-all' type='checkbox' class='form-control'></th>";
						echo "<th onclick='sortTable(1)' class='text-center'>Requested at</th>";
						echo "<th onclick='sortTable(2)' class='text-center'>Song</th>";
						echo "<th onclick='sortTable(3)' class='text-center'>Year</th>";
						echo "<th onclick='sortTable(4)' class='text-center'>Pin</th>";
						echo "<th onclick='sortTable(5)' class='text-center'>Delete</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)) {
						if($row['request_pinned'] == 1) {					
							echo "<tr class='alert-warning'>";
						} else if($row['request_pinned'] == 1) {					
							echo "<tr style='background-color: white;'>";
						}
								echo "<td><input id='checkBox' type='checkbox' class='form-control'></td>";
								// Get time ago.
								echo "<td>".xTimeAgo(time(), strtotime($row['request_time']), "x")."</td>";
								echo "<td><b>".$row['song_name']. "</b> - " .$row['song_artist']."</td>";
								echo "<td class='text-center'>".$row['song_year']."</td>";
								// Pinned UI check.
								if($row['request_pinned'] == 0) {
									echo "<td class='text-center' style='background-color: white;'><a href=functions/func_request_pin.php?request_id=".$row['request_id'].">Pin</a></td>";
								}
								if($row['request_pinned'] == 1) {
									echo "<td class='text-center'><a href=functions/func_request_pin.php?request_id=".$row['request_id']."><img src='../images/push-pin.png' alt='Pinned' width='24' height='24'></a></td>";
								}
								echo "<td class='text-center'><a href=functions/func_request_inactive.php?request_id=".$row['request_id']." class='btn btn-danger'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
<script type="text/javascript">
	$(function () {
		$(".font-button").bind("click", function () {
			var size = parseInt($('table').css("font-size"));
			if ($(this).hasClass("plus")) {
				size = size + 2;
			} else {
				size = size - 2;
				if (size <= 10) {
					size = 10;
				}
			}
			$('table').css("font-size", size);
		});
	});

	// hide status bar
$('#status_bar').hide();

// SELECT ALL
// Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>