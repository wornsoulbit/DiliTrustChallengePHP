<?php

namespace App\models;

class User extends \App\core\Model {

    public $username;
    public $password_hash;

    public function __construct() {
        parent::__construct();
    }

    public function find($username) {
        $stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\User");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)");
        $stmt->execute(['username' => $this->username, 'password_hash' => $this->password_hash]);
    }

    public function update2fa() {
        $stmt = self::$connection->prepare("UPDATE user SET secret_key = :secret_key WHERE user_id = :user_id");
        $stmt->execute(['secret_key' => $this->secret_key, 'user_id' => $this->user_id]);
    }

}
