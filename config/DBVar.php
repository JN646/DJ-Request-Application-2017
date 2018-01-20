<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/

/* 
This file loads all of the global variables for the application. When you install the system, ensure you go through this file and make sure all of the correct variables and details have been added to this file.

Make a backup of this file as changes can have catastrophic results. 
 */

// Global Variables.
define("LOCAL", "http://localhost/djx/djx/"); //local URL
define("WEB", "http://192.168.1.72:80/djx/djx/"); //website URL
$environment = WEB; //change to WEB if you're live

// Venue Details
// Enter the details of your venue, these variables can be loaded in the application.
$VenueName = "My Venue";
$VenueSlogan = "The best venue. This text is loaded dynamically from a config file.";
$VenueType = "Club";

// Venue opening and closing times.
$VenueOpenTime = "2200";
$VenueCloseTime = "0400";

// Kiosk closed message
$KioskClosedMessage = "Sorry but this kiosk is closed.";

// Social Media
$FacebookAccount = "http://facebook.com/google";
$TwitterAccount = "@test";
$SnapchatAccount = "Test";
$VenuePhone = "01234 123456";
?>