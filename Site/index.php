<!DOCTYPE html>
<html>
    <head>
        <title>temp login page</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Username: <input type="text" name="username" /></label><br />
            <label>Password: <input type="password" name="password" /></label><br />
            <input type="submit" name="action" value="Login" />
        </form>
        <a href="<?= BASE ?>/Default/register">Register Here!</a>
    </body>
</html>