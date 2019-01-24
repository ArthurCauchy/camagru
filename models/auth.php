<?php

require_once("models/Database.class.php");

function tryLogin($username, $passwd) {
    if (Database::getInstance()->checkUserCredentials($username, $passwd)) {
        $_SESSION["username"] = $username;
        return TRUE;
    }
    return FALSE;
}

function isLogged() {
	return (isset($_SESSION["username"]));
}