<?php

require 'functions.php';
require 'router.php';
require 'Database.php';


$config = require 'config.php';
$db = new Database($config['database']);
// dd($_GET['id']);
$posts = $db->query("select * from posts")->fetch();

// var_dump($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li><br>";
// }
    

