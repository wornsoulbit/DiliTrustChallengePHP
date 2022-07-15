<!DOCTYPE html>
<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    public $conn = createDBConnection();

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

    function createDBConnection() {
        $servername = "localhost";
        $DBName = 'DiliTrust';
        $username = "root";
        $password = "admin";
    
        try {
            $connection = new PDO("mysql:host=$servername;dbname=$DBName", $username, $password);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully\n";
            return $connection;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }

    function verifyLogin() {
        // TODO: Retrieve data from db, verify username and password hash.
        // session_start();
        $stmt = $conn->prepare("SELECT username FROM User WHERE username EQUALS $username");
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);

        return false;
    }

    function insertUser() {
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