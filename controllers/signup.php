<?php

require_once("models/Database.class.php");

if (isset($_POST["username"]) && isset($_POST["username"]) && isset($_POST["passwd"])) {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["passwd"];

    if (Database::getInstance()->createUser($username, $email, $password)) {
        // success
    } else {
        $error = 'Wrong credentials.';
    }
}

$title = 'Camagru - Sign up';

require('views/header.php');
require('views/signup.php');
