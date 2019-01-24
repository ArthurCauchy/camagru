<body>
<?php

if (isset($error)) {
    echo '<p style="color:red">Error: ' . $error . '</p>';
}

?>
<p>Sign in to your account.</p>
<form method="POST" action="index.php?page=signin">
    <input type="text" name="username"/>
    <input type="password" name="passwd"/>
    <input type="submit" value="OK"/>
</form>
</body>
</html>
