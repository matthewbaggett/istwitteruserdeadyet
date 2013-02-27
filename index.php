<?php
// Load the Config
$config = parse_ini_file("config.ini", true);

// Decide what to display.
$state = "No";

$username = $config['user']['twitter_name'];
$alias = $config['user']['alias_name'];

$rand = rand(0, count($config['adjectives'][$state])-1);
$adjective = ucfirst($config['adjectives'][$state][$rand]);

$rand = rand(0, count($config['taglines']['tagline'])-1);
$tagline = $config['taglines']['tagline'][$rand];

// Render the template.
require("template.phtml");
