<body>
<?php

if (isset($error)) {
    echo '<p style="color:red">Error: ' . $error . '</p>';
}

?>
<p>Join our community.</p>
<form method="POST" action="index.php?page=signup">
    <input type="text" name="username"/>
    <input type="text" name="email"/>
    <input type="password" name="passwd"/>
    <input type="submit" value="OK"/>
</form>
</body>
</html>
