<?php

require_once("models/Database.class.php");
require_once("models/MailSender.class.php");

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["passwd"])) {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $verif_token = bin2hex(openssl_random_pseudo_bytes(16));
    $password = password_hash($_POST["passwd"], PASSWORD_BCRYPT);

    if (Database::getInstance()->createUser($username, $email, $verif_token, $password)) {
        $mailsender = new MailSender("camagru@42.fr");
        $mailsender->sendMail($email,
            "Welcome to Camagru !",
            "Welcome " . $username . " !\r\nOne last step : activate your account by clicking on this link : http://localhost:8100/index.php?page=activate&token=" . $verif_token);
        // TODO add success message or redirect
    } else {
        $error = 'Error.'; // TODO error brief
    }
}

$title = 'Camagru - Sign up';

require('views/header.php');
require('views/signup.php');
