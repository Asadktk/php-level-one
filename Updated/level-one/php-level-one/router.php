<?php

$uri = $_SERVER['REQUEST_URI'];
// dd($uri);

$parsed_url = parse_url($uri);
$path = $parsed_url['path'];
$query = isset($parsed_url['query']) ? $parsed_url['query'] : '';

if($uri === '/about'){
    require 'controllers/about.php';
}
else if($uri === '/contact'){
    require 'controllers/contact.php';
}
else {
    require 'controllers/index.php'; 
}


