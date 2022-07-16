<?php

namespace App\models;

class Message extends \App\core\Model {

    public $sender;
    public $receiver;
    public $message;
    public $timestamp;
    public $private_status;
    public $read_status;

    public function __construct() {
        parent::__construct();
    }

    public function find($message_id) {
        $stmt = self::$connection->prepare("SELECT * FROM message WHERE message_id = :message_id");
        $stmt->execute(['message' => $message]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Message");
        return $stmt->fetch();
    }

    public function findAllReceived($receiver) {
        $stmt = self::$connection->prepare("SELECT * FROM message WHERE receiver = :receiver");
        $stmt->execute(['receiver' => $receiver]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Message");
        return $stmt->fetch();
    }

    public function findAllSent($sender) {
        $stmt = self::$connection->prepare("SELECT * FROM message WHERE sender = :sender");
        $stmt->execute(['sender' => $sender]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Message");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO message($sender, $receiver, $message, $private_status, 
        $read_status) VALUES (:sender, :receiver, :message, :private_status, 
        :read_status)");
        $stmt->execute(['sender' => $this->sender, 'receiver' => $this->receiver, 'message' => $this->message,
            'private_status' => $this->private_status, 'read_status' => $this->read_status]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from message WHERE message_id=:message_id");
        $stmt->execute(['message_id' => $this->message_id]);
    }

}
