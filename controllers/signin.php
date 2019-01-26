<?php

require_once("models/Database.class.php");
require_once("models/auth.php");

if (isset($_POST["username"]) && isset($_POST["passwd"])) {
     if (tryLogin($_POST["username"], $_POST["passwd"])) {
        if (!Database::getInstance()->checkAccountVerified($_POST["username"])) {
            $error = 'You must activate your account first. You received validation link by email.';
        } else {
            http_response_code(302);
            header("Location: index.php?page=home");
            exit;
        }
     } else {
         $error = 'Wrong username/password.';
     }
}

$title = 'Camagru - Sign in';

require('views/header.php');
require('views/signin.php');
