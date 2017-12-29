<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017
* FileCreated:	171210
*/

//Global Variables.
define("LOCAL", "http://localhost/djx/djx/"); //local URL
define("WEB", "http://foo.bar"); //website URL
$environment = LOCAL; //change to WEB if you're live

// Venue Details
// Enter the details of your venue, these variables can be loaded in the application.
$VenueName = "My Venue";
$VenueSlogan = "The best venue. This text is loaded from a config file.";
$VenueType = "Club";

// Venue opening and closing times.
$VenueOpenTime = "2200";
$VenueCloseTime = "0400";

// Kiosk closed message
$KioskClosedMessage = "Sorry but this kiosk is closed.";
?>