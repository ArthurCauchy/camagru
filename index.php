<?php

$page = "controllers/";

if (isset($_GET["page"])) {
	if (file_exists($page . htmlspecialchars($_GET["page"]) . ".php") {
		$page .= htmlspecialchars($_GET["page"]) . ".php";
	} else {
		$page .= "404.php"
	}
} else {
	$page .= "login.php"; // default page
}

require($page);
