<?php

namespace App\models;

class Profile extends \App\core\Model {

    public $user_id;
    public $first_name;
    public $last_name;
    public $middle_name;

    public function __construct() {
        parent::__construct();
    }

    public function find($message_id) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
        $stmt->execute(['profile' => $profile]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO profile($user_id, $first_name, $last_name, $middle_name) 
        VALUES (:user_id, :first_name, :last_name, :middle_name)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' => $this->first_name, 'last_name' => $this->last_name,
            'middle_name' => $this->middle_name]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from message WHERE message_id=:message_id");
        $stmt->execute(['message_id' => $this->message_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE profile SET first_name=:first_name, last_name=:last_name,
        middle_name=:middle_name WHERE profile_id=:profile_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
            'middle_name' => $this->middle_name, 'profile_id' => $this->profile_id]);
    }

}
