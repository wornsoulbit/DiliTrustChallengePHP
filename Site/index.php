<!DOCTYPE html>
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    $servername = "localhost";
    $DBName = 'DiliTrust';
    $dbusername = "root";
    $password = "admin";

    $conn = new mysqli($servername, $dbusername, $password, $DBName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['Login'])) {
        echo "Login Attempt\n";
        // Call login verification function
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (verifyLogin($username, $conn)) {
            // Login to the user
            echo "Welcome user\n";
            // Create a session token.
        } else {
            // Don't log in.
            echo "Invalid username/password\n";
        }
        
        echo "username: " . $username . " Password: " . $password . "\n";
    }

    function verifyLogin($username, $conn) {
        // TODO: Retrieve data from db, verify username and password hash.
        // session_start();
        $stmt = $conn->prepare("SELECT username FROM User WHERE username = :username");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        echo $stmt;
        $result = $stmt->fetch();
        print_r($result);
        return false;
    }

    function insertUser($conn) {
        $sql = "INSERT INTO Users (username, password_hash) VALUES (?, ?)";
        $conn->prepare($sql)->execute([$username, $password]);
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