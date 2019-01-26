<?php

require_once("config/database.php");

class Database {
    private static $_instance = NULL;
    private $pdo = NULL;

    private function __construct() {
        global $DB_DSN, $DB_USER, $DB_PASSWORD;
        $this->pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if(self::$_instance === NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    public function activateAccount($verif_token) {
        $stmt = $this->pdo->prepare("UPDATE `users` SET `verified` = TRUE WHERE `verif_token` = :token");
        $stmt->bindParam(':token', $verif_token, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function checkAccountVerified($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && $user["verified"]) {
            return TRUE;
        }
        return FALSE;
    }

    public function checkUserCredentials($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['passwd'])) {
            return TRUE;
        }
        return FALSE;
    }

    public function createUser($username, $email, $verif_token, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`username`, `email`, `verif_token`, `passwd`) VALUES (:username, :email, :token, :passwd)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':token', $verif_token, PDO::PARAM_STR);
        $stmt->bindParam(':passwd', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
}