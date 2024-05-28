<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserID = 3;



    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserID);

    view("notes/show.view.php", [
        'heading' => 'Show Notes',
        'note' => $note
    ]);

// require "views/notes/show.view.php";