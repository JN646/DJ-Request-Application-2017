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
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form>
	<label>Username:</label>
	<input type="text"></input><br>
	<label>Password:</label>
	<input type="password"></input><br>
	<button type="button">Login</button>
	</form>
</body>