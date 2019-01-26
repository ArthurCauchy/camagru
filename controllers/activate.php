<?php

require_once("models/Database.class.php");

if (isset($_GET["token"])) {
    $token = htmlspecialchars($_GET["token"]);

    if (Database::getInstance()->activateAccount($token)) {
        http_response_code(302);
        header("Location: index.php?page=signin"); // TODO print a message saying "account activated" on login page ?
        exit;
    } else {
        echo "Error: Couldn't activate account.";
    }
}
