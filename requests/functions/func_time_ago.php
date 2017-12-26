/*
Function taken from
https://webdevdoor.com/php/php-seconds-minutes-hours-ago
*/

function xTimeAgo ($varTime, $nowTime, $timeType) {
$timeCalc = strtotime($newTime) – strtotime($oldTime);
if ($timeType == "x") {
	if ($timeCalc > 0) {
		$timeType = "s";
	}
	if ($timeCalc > 60) {
		$timeType = "m";
	}
	if ($timeCalc > (3600)) {
		$timeType = "h";
	}
	}
	if ($timeType == "s") {
		$timeCalc = " seconds ago";
	}
	if ($timeType == "m") {
		$timeCalc = round($timeCalc/60) . " minutes ago";
	}
	if ($timeType == "h") {
		$timeCalc = round($timeCalc/60/60) . " hours ago";
	}
	return $timeCalc;
}