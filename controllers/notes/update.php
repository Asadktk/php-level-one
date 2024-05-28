<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserID = 3;

$errors = [];

    $note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserID);

    
if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more then 1,000 characters is required.';
}

if (!empty($errors)) {

  return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'erors' => $errors,
        'note' => $note
    ]);
}


    $db->query('update notes set body = :body where id = :id',[
        'id' => $_POST['id'],
        'body' => $_POST['body'],
    ]);

    header('location: /notes');
    die();

