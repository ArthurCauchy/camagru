<?php

require_once("models/auth.php");

if (isset($_POST["username"]) && isset($_POST["passwd"])) {
    if (tryLogin($_POST["username"], $_POST["passwd"])) {
        http_response_code(302);
        header("Location: index.php?page=home");
        exit;
    }
    $error = 'Wrong credentials.';
}

$title = 'Camagru - Sign in';

require('views/header.php');
require('views/signin.php');
