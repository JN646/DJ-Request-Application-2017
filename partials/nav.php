<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171210
*/

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//echo "<p>User</p>";
} else {
	//echo "<p>Admin</p>";
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav_container.php");
}
?>