<?php
require_once("config.php");
$state = "No";
$adjectives['No'] 	= array("disastrously", "dismally", "grievously", "horribly", "lamentably", "miserably", "regrettably", "sadly", "unhappily", "unsuccessfully", "Poor Show");
$adjectives['Yes'] 	= array("Thankfully", "Happilly", "Jolly Good");
$rand = rand(0, count($adjectives[$state]));
$adjective = ucfirst($adjectives[$state][$rand]);

$taglines = array("About blunt as a German Barmaid", "Morbid!");
$rand = rand(0, count($taglines));
$tagline = $taglines[$rand];

require("template.phtml");
