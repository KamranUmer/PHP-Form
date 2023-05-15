<?php
//login section 
require_once 'db.php';
require_once 'hashing.php';

function register($firstname, $lastname, $email, $password) {
    // This function registers a User.
    // $firstname (string): First Name of the user
    // $lastname (string): Last Name of the user
    // $email (string) (used for login): Email of the user
    // $password (string) (used for login): Password of the user

    $user = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "password" => hash_password($password),
        "created_at" => date("Y-m-d H:i:s"),
        "last_login" => null
    );
    global $users_db;
    $users_db[] = $user;
}

function login($email, $password) {
    // This function is intended for user login.
    // $email: Email of the user
    // $password: Password of the user.

    global $users_db;
    foreach ($users_db as $user) {
        if ($user["email"] === $email && verify_password($password, $user["password"])) {
            echo "Logged In.\n";
            break;
        }
    }
    else {
        echo "Invalid email or Password.\n";
    }
}

register("kami", "khatak", "kami@gmail.com", "123");
// echo json_encode($users_db, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
print_r($users_db);
login("kami@gmail.com", "123");
