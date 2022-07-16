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

    public function find($profile_id) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id' => $profile_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function searchForUser($keyword) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name LIKE :first_name "
                . "OR last_name LIKE :last_name OR middle_name LIKE :middle_name");
        $keyword = "%$keyword%";
        $stmt->execute(['first_name' => $keyword, 'last_name' => $keyword, 'middle_name' => $keyword]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetchAll();
    }

    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function getAllProfiles() {
        $stmt = self::$connection->query("SELECT * FROM profile");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO profile(user_id, first_name, last_name, middle_name) 
        VALUES (:user_id, :first_name, :last_name, :middle_name)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' =>
            $this->first_name, 'last_name' => $this->last_name, 'middle_name' => $this->middle_name]);
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
