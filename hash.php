<?php

require_once 'bcrypt.php';

// SALT
$salt = '$2b$12$JiG/F.oVp3CNdJBx6IWBou';

function hash_password($plain_password) {
    // This function hashes the password.
    global $salt;
    $password_bytes = bcrypt_hash($plain_password, $salt);
    return $password_bytes;
}

function verify_password($plain_password, $password_hash) {
    // This function verifies the hashed password.
    return bcrypt_verify($plain_password, $password_hash);
}

$kamran_hash = '$2b$12$JiG/F.oVp3CNdJBx6IWBougLGCiUBCnG6yzimToop8ZuMgTvfAve2';

echo verify_password('kamran', $kamran_hash) ? 'Password is correct.' : 'Password is incorrect.';
