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

    public function checkUserCredentials($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && $password === $user['passwd']) { // use password_verify() and bcrypt ?
            return TRUE;
        }
        return FALSE;
    }

    public function createUser($username, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`username`, `email`, `passwd`) VALUES (:username, :email, :passwd)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':passwd', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
}