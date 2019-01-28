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
?>
<div class="gallery">
<?php

foreach($pictures as $pic) {
    echo "<div class=\"gallery-item\">\n";
    echo $pic['id'] . "\n";
    echo "<div class=\"bottom\">\n";
    echo "<div class=\"comment-btn\"><img src=\"res/images/message-square.svg\"/>" . $pic["comments"] . "</div>";
    echo "<div class=\"like-btn\"><img src=\"res/images/heart.svg\"/>" . $pic["likes"] . "</div>\n";
    echo "</div>\n";
    echo "</div>\n";
}

?>
</div>
</body>
</html>
