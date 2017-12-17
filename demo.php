<?php
/* Grab the other page which communicates with Last FM */
require_once "lastfm.php";
/* Image tag so that an image gets displayed rather than a URL */
echo "<img src=\"";
/* Here's where you tell it what artwork you want getting. Artist followed by album */
    echo LastFMArtwork::getArtwork('Taylor Swift', 'RED', true, "mega");
/* Close off the image tag */
    echo "\">";
?>