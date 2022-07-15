<!DOCTYPE html>
<?php

//Database connection.
$host = '127.0.0.1';
$DBName = 'DiliTrust';
$username = 'root';
$password = 'admin'

try {
    $conn = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf-8;", $username, $password);
    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
    echo "Connected Successfully!";
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

echo "Hello World! From PHP!";

?>
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