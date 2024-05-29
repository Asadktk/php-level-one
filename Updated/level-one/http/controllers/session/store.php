<?php
use Core\App;
use Core\Validator;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if(! $form->validate($email, $password)){
    return view('session/create.view.php', [
                'errors' => $form ->errors()
            ]);
}
// ;
// $errors = [];

// if (!Validator::email($email)) {
//     $errors['email'] = 'Please provide a  valid email address';
// }
// if (!Validator::string($password)) {
//     $errors['password'] = 'Please provide a valid password';
// }

// if (!empty($errors)) {
//     return view('session/create.view.php', [
//         'errors' => $errors
//     ]);
// }

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){
    if(password_verify($password, $user['password'])){
        login([
            'email' => $email
        ]);
    
        header('location: /');
        exit();
    }
    
}


return view('session/create.view.php', [
    'errors' =>[
        'email' => 'No matching account found for that email address and password.'
    ]
]);
// dd($user);
