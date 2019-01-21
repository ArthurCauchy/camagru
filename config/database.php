<?php

$DB_DSN = 'mysql:dbname=camagru;host=127.0.0.1';
$DB_USER = 'root';
$DB_PASSWORD = 'abcdef';

// Users table
$sql_table_users = "CREATE TABLE `users` (
	`id` int(9) unsigned AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`passwd` VARCHAR(255) NOT NULL
)";

// Pictures table
$sql_table_pictures = "CREATE TABLE `pictures` (
	`id` int(9) unsigned AUTO_INCREMENT PRIMARY KEY,
	`user_id` int(9) unsigned NOT NULL,
	`likes` int(9) unsigned NOT NULL,
	FOREIGN KEY (`user_id`)
		REFERENCES `users`(`id`)
		ON DELETE CASCADE
)";

// Comments table
$sql_table_comments = "CREATE TABLE `comments` (
	`id` int(9) unsigned AUTO_INCREMENT PRIMARY KEY,
	`user_id` int(9) unsigned NOT NULL,
	`picture_id` int(9) unsigned NOT NULL,
	`text` text NOT NULL,
	FOREIGN KEY (`user_id`)
		REFERENCES `users`(`id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`picture_id`)
		REFERENCES `pictures`(`id`)
		ON DELETE CASCADE
)";
