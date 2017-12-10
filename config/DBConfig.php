 <?php
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