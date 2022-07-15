<?php

//Database connection.
$host = '127.0.0.1';
$DBName = 'dilitrust';
$username = 'root';
$password = 'admin'

try {
    $conn = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf-8;", $username, $password);
    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
    echo "Connected Successfully!";
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

?>