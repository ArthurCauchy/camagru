<?php

require_once("models/auth.php");

if (!isLogged()) {
    http_response_code(302);
    header("Location: index.php?page=login");
    exit;
}

$title = 'Camagru - Account';

require('views/header.php');
require('views/account.php');
