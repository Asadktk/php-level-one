<?php
// require 'functions.php';
// dd("test here..!");
$_SESSION = [];

session_destroy();

$params = session_get_cookie_params();

setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

header('location: /');

exit();