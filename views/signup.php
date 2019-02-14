<body>
<?php

if (isset($error)) {
    echo '<p style="color:red">Error: ' . $error . '</p>';
}

?>
<p>Join our community.</p>
<form method="POST" action="index.php?page=signup">
    <input type="text" name="username" placeholder="username" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>" pattern="[a-zA-Z0-9 ]+" required/>
    <input type="email" name="email" placeholder="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>" required/>
    <input type="password" name="passwd" placeholder="password" value="<?php if (isset($_POST["passwd"])) echo $_POST["passwd"] ?>" required/>
    <input type="submit" value="OK"/>
</form>
</body>
</html>
