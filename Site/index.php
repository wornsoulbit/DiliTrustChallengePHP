<!DOCTYPE html>
<?php 
    if (isset($_POST['action'])) {
        echo $_POST;
        if (isset($_POST['action']['Login'])) {
            echo "Login Attempt";
            // Call login verification function

            if (verifyLogin()) {
                // Login to the user
                echo "Welcome user";
                // Create a session token.
            } else {
                // Don't log in.
                echo "Invalid username/password";
            }
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo "username: " . $username . " Password: " . $password;
    }

    $servername = "localhost";
    $DBName = 'DiliTrust';
    $username = "root";
    $password = "admin";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    function verifyLogin() {
        return false;
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
        <input type="submit" name="action" value="Login" />
    </form>
    <a href="register.php">Register Here!</a>
</body>