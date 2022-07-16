<?php

namespace App\models;

class PictureLike extends \App\core\Model {

    public $read_status;
    public $timestamp;
    public $profile_id;
    public $picture_id;

    public function __construct() {
        parent::__construct();
    }

    public function insert($picture_id, $profile_id) {
        $stmt = self::$connection->prepare("INSERT INTO picture_like(read_status, timestamp, picture_id, profile_id)
        VALUES (:read_status, :timestamp, :picture_id, :profile_id)");
        $stmt->execute(['read_status' => $this->read_status, 'timestamp' => $this->timestamp,
            'picture_id' => $this->picture_id, 'profile_id' => $this->profile_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM picture_like WHERE profile_id = :profile_id AND picture_id = :picture_id");
        $stmt->execute(['picture_id' => $this->picture_id, 'profile_id' => $this->profile_id]);
    }

    public function find($picture_id, $profile_id){
		$stmt = self::$connection->prepare("SELECT * FROM picture_like WHERE picture_id = :picture_id AND 
        profile_id = :profile_id");
		$stmt->execute(['picture_id'=>$picture_id, 'profile_id'=>$profile_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\PictureLike");
		return $stmt->fetch();
	}

}
