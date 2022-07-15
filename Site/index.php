<!DOCTYPE html>
<?php 

    $servername = "localhost";
    $DBName = 'DiliTrust';
    $username = "root";
    $password = "admin";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully\n";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
    }

    if (isset($_POST['Login'])) {
        echo "Login Attempt\n";
        // Call login verification function

        if (verifyLogin()) {
            // Login to the user
            echo "Welcome user\n";
            // Create a session token.
        } else {
            // Don't log in.
            echo "Invalid username/password\n";
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo "username: " . $username . " Password: " . $password . "\n";
    }

    function verifyLogin() {
        // TODO: Retrieve data from db, verify username and password hash.
        // session_start();
        return false;
    }

    function findUsername($username) {
        $stmt = self::$conn->prepare("SELECT * FROM Profile WHERE username = :username");
        $stmt->execute(['username'] => $username);
        $stmt->setFetchMode(\PDO::FETCH_COLUMN);
        return $stmt->fetch();
    }
?>
<head> 
    <title> Landing Page </title> 
</head>
<body>
    <?php
    if (isset($_GET['error']))
        echo $_GET['error'];
    ?>
    <form method="post" action="">
        <label>Username: <input type="text" name="username" /></label><br />
        <label>Password: <input type="password" name="password" /></label><br />
        <input type="submit" name="Login" value="Login" />
    </form>
    <a href="register.php">Register Here!</a>
</body>