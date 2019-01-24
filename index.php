<?php

session_start();

$page = "controllers/";

if (isset($_GET["page"])) {
	if (file_exists($page . htmlspecialchars($_GET["page"]) . ".php")) { // UNSECURE: . and .. !
		$page .= htmlspecialchars($_GET["page"]) . ".php";
	} else {
		$page .= "404.php";
	}
} else {
	$page .= "home.php"; // default page
}

require($page);
