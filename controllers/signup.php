<?php

require_once("models/Database.class.php");

if (isset($_POST["username"]) && isset($_POST["username"]) && isset($_POST["passwd"])) {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $verif_token = bin2hex(openssl_random_pseudo_bytes(16));
    $password = password_hash($_POST["passwd"], PASSWORD_BCRYPT);

    if (Database::getInstance()->createUser($username, $email, $verif_token, $password)) {
        //MailSender::
        // TODO add success message or redirect
    } else {
        $error = 'Wrong credentials.';
    }
}

$title = 'Camagru - Sign up';

require('views/header.php');
require('views/signup.php');
