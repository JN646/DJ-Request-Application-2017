<?php
/**
* Project:		DJ Request Application
* Copyright:		(C) JGinn 2017
* FileCreated:	171227
*/

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	// If not logged in.
} else {
	// If logged in.
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php");
}
?>