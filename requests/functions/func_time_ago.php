<?php
/*
Function taken from
https://webdevdoor.com/php/php-seconds-minutes-hours-ago
*/

function xTimeAgo ($varTime, $nowTime, $timeType) {
$timeCalc = $varTime - $nowTime;

//Auto Select units
if ($timeType == "x") {
	if ($timeCalc >= 0) {
		$timeType = "s";
	}
	if ($timeCalc >= 60) {
		$timeType = "m";
	}
	if ($timeCalc >= (3600)) {
		$timeType = "h";
	}
}

if($timeType == "s") {
	$timeUnit = " second";
	$timeVal = $timeCalc;
}
if($timeType == "m") {
	$timeUnit = " minute";
	$timeVal = round($timeCalc/60);
}
if($timeType == "h") {
	$timeUnit = " hour";
	$timeVal = round($timeCalc/3600);
}

if($timeVal!=1)
	$plural = "s";

return $timeVal.$timeUnit.$plural." ago";
}
?>