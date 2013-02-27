<?php
// Load the Config
$config_file = "config.ini";
$cache_file = 'feed.cache';
if(!file_exists($config_file)){
    die("No config");
}
$config = parse_ini_file($config_file, true);
$username = $config['user']['twitter_name'];
$alias = $config['user']['alias_name'];

// Get the feed, either cached or fresh
if(!file_exists($cache_file) || filemtime($cache_file) < strtotime("1 hour ago") || true){
    $url = "https://api.twitter.com/1/statuses/user_timeline/{$username}.json?count=5";
    $ch = curl_init();
    $timeout = 5; // set to zero for no timeout
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);
    curl_close($ch);

    if($file_contents){
        file_put_contents($cache_file, $file_contents);
    }
}

// Parse the feed
$feed = json_decode(file_get_contents($cache_file), true);
$last_time_seen = strtotime($feed[0]['created_at']);
if($last_time_seen < strtotime($config['user']['presume_dead_timeout'])){
    $state = "Yes";
}else{
    $state = "No";
}

// Decide what to display.
$rand = rand(0, count($config['adjectives'][$state])-1);
$adjective = ucfirst($config['adjectives'][$state][$rand]);

$rand = rand(0, count($config['taglines']['tagline'])-1);
$tagline = $config['taglines']['tagline'][$rand];

// Render the template.
require("template.phtml");
