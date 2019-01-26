<body>
<p>This is the homepage.</p>
<?php

if (isLogged()) {
    echo '<p>Welcome ' . $_SESSION["username"] . '.</p>';
    echo '<p><a href="index.php?page=account">Manage account</a></p>';
    echo '<p><a href="index.php?page=logout">Logout</a></p>';
} else {
    echo '<p>Welcome guest.</p>';
    echo '<p><a href="index.php?page=signin">Sign in</a></p>';
    echo '<p><a href="index.php?page=signup">Sign up</a></p>';
}

foreach($pictures as $pic) {
    // do smthng
}

?>
</body>
</html>
