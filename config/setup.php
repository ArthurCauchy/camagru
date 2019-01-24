<?php

require_once('database.php');

try {
	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db->exec($sql_table_users);
	$db->exec($sql_table_pictures);
	$db->exec($sql_table_comments);
} catch (PDOException $e) {
	error_log('PDO Exception: ' . $e->getMessage());
	die('An error occured.');
}
