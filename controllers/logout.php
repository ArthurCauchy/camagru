<?php

session_destroy();
http_response_code(302);
header("Location: index.php?page=home");
exit;