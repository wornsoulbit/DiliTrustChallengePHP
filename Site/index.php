<!DOCTYPE html>
<head> <title> Landing Page </title> </head>
<body>
    <?php
    if (isset($_GET['error']))
        echo $_GET['error'];
    ?>
    <form method="post" action="">
        <label>Username: <input type="text" name="username" /></label><br />
        <label>Password: <input type="password" name="password" /></label><br />
        <input type="submit" name="action" value="Login" />
    </form>
    <a href="<?= BASE ?>/Default/register">Register Here!</a>
</body>