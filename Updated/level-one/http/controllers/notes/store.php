<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$errors = [];



if (! Validator::string($_POST['body'], 1, 1000)) {
   
    $errors['body'] = 'A body of no more then 1,000 characters is required.';
   
}

if (! empty($errors)) {
  return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}


    $db->query('insert into notes(body, user_id) Values(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 3
    ]);

    header('location: /notes');
    die();

