<?php

namespace App\models;

class Picture extends \App\core\Model {

    public $filename;
    public $caption;
    public $profile_id;

    public function __construct() {
        parent::__construct();
    }

    public function find($picture_id) {
        $stmt = self::$connection->prepare("SELECT * FROM picture WHERE picture_id = :picture_id");
        $stmt->execute(['picture_id' => $picture_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Picture");
        return $stmt->fetch();
    }

    public function getAllFromUser() {
        $stmt = self::$connection->query("SELECT * FROM picture WHERE profile_id = :profile_id");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Picture");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO picture(filename, caption, profile_id) VALUES 
		(:filename, :alt, :caption, :profile_id)");
        $stmt->execute(['filename' => $this->filename, 'alt' => $this->alt, 'caption' => $this->caption, 'profile_id' => $this->profile_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE picture SET caption=:caption WHERE picture_id = :picture_id");
        $stmt->execute(['picture_id' => $this->picture_id, 'caption' => $this->caption, 'profile_id' => $this->profile_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM picture WHERE picture_id=:picture_id");
        $stmt->execute(['picture_id' => $this->picture_id]);
    }

}
