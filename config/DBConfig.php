 <?php
  /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
//Customise this file to match your server configutation. If you are unsure what settings these need to be, then contact you system administrator.

//MySQL connection
//Server, Username, Password, Database.
$mysqli = new mysqli('localhost', 'root', '', 'djx');
 
//If connection fail
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>