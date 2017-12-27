<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");


/*
Order of operations:
receive values of zone id's and session id.
for each activated zone id, add a row to sessionzone
*/
?>
//do for each

<script>
for(each zone_id)
	if(val[$zone_id]==true)
		<?php "INSERT INTO sessionzone (session_id, zone_id) VALUES ('$sessionid', '$zone_id')" ?>
</script>

?>