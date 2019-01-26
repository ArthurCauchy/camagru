<?php

require_once("models/Database.class.php");
require_once("models/auth.php");

$pictures = Database::getInstance()->getPictures();

$title = 'Camagru - Home';

require('views/header.php');
require('views/home.php');
