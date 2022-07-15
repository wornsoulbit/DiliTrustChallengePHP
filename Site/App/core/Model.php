<?php 
namespace App\core;

class Model {
    protected static $connection;

    public function __construct() {
        $host = '127.0.0.1';
        $DBName = 'DiliTrust';
        $username = 'root';
        $password = 'admin';

        self::$connection = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf8;", $username, $password);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXECPTION);
    }
}
?>