<body>
<?php

if (isset($error)) {
    echo '<p style="color:red">Error: ' . $error . '</p>';
}

?>
<p>Sign in to your account.</p>
<form method="POST" action="index.php?page=signin">
    <input type="text" name="username" placeholder="username" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>"/>
    <input type="password" name="passwd" placeholder="password" value="<?php if (isset($_POST["passwd"])) echo $_POST["passwd"] ?>"/>
    <input type="submit" value="OK"/>
</form>
</body>
</html>
