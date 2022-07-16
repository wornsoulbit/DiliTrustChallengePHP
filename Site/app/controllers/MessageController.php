<?php

namespace App\controllers;

class MessageController extends \App\core\Controller {

    function index($profile_id) {
        $getAllMessages = new \App\models\Message();
        $getAllMessages = $getAllMessages->getAllMessages($profile_id);

        $getAllProfiles = new \App\models\Profile();
        $getAllProfiles = $getAllProfiles->getAllProfiles();

        $this->view('Message/inbox', ['message' => $getAllMessages, 'profile' => $getAllProfiles]);
    }

    function outbox($sender_id) {
        $getAllSentMessages = new \App\models\Message();
        $getAllSentMessages = $getAllSentMessages->findAllSent($sender_id);

        $getAllProfiles = new \App\models\Profile();
        $getAllProfiles = $getAllProfiles->getAllProfiles();

        $this->view('Message/outbox', ['message' => $getAllSentMessages, 'profile' => $getAllProfiles]);
    }

    function inboxViewMessage($message_id) {
        $getMessage = new \App\models\Message();
        $getMessage = $getMessage->find($message_id);

        $getMessage->sender = $getMessage->sender;
        $getMessage->receiver = $getMessage->receiver;
        $getMessage->message = $getMessage->message;
        $getMessage->private_status = $getMessage->private_status;
        $getMessage->read_status = "read";
        $getMessage->update();

        $currentProfile = new \App\models\Profile();
        $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        $getProfile = new \App\models\Profile();
        $getProfile = $getProfile->getAllProfiles();

        $this->view('Message/inboxViewMessage', ['message' => $getMessage, 'profile'
            => $getProfile, 'currentProfile' => $currentProfile]);
    }

    function outboxViewMessage($message_id) {
        $getMessage = new \App\models\Message();
        $getMessage = $getMessage->find($message_id);

        $getMessage->sender = $getMessage->sender;
        $getMessage->receiver = $getMessage->receiver;
        $getMessage->message = $getMessage->message;
        $getMessage->private_status = $getMessage->private_status;
        $getMessage->read_status = "read";
        $getMessage->update();

        $currentProfile = new \App\models\Profile();
        $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        $getProfile = new \App\models\Profile();
        $getProfile = $getProfile->getAllProfiles();

        $this->view('Message/outboxViewMessage', ['message' => $getMessage, 'profile'
            => $getProfile, 'currentProfile' => $currentProfile]);
    }

    function delete($message_id) {
        $message = new \App\models\Message();
        $message->message_id = $message_id;

        $currentProfile = new \App\models\Message();
        $currentProfile = $currentProfile->find($message_id);

        $message->delete();
        header("location:" . BASE . "/Message/index/$currentProfile->receiver");
    }

    function sendMessageToProfile($receiver) {
        $senderProfile = new \App\models\Profile();
        $senderProfile = $senderProfile->findUserId($_SESSION['user_id']);

        $receiverProfile = new \App\models\Profile();
        $receiverProfile = $receiverProfile->find($receiver);

        if (isset($_POST["action"])) {
            $message = new \App\models\Message();
            $message->sender = $senderProfile->profile_id;
            $message->receiver = $receiverProfile->profile_id;
            $message->message = $_POST["message"];
            $message->private_status = $_POST["private_status"];
            $message->read_status = "unread";
            $message->insert();
            header("location:" . BASE . "/Profile/listOfProfiles");
        } else {
            $message = new \App\models\Message();
            $this->view('Message/sendMessage', ['message' => $message, 'receiverProfile' => $receiverProfile]);
        }
    }

    function reRead($message_id) {
        $getMessage = new \App\models\Message();
        $getMessage = $getMessage->find($message_id);

        $getMessage->sender = $getMessage->sender;
        $getMessage->receiver = $getMessage->receiver;
        $getMessage->message = $getMessage->message;
        $getMessage->private_status = $getMessage->private_status;
        $getMessage->read_status = "to reread";
        $getMessage->update();

        $currentProfile = new \App\models\Profile();
        $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        $getProfile = new \App\models\Profile();
        $getProfile = $getProfile->getAllProfiles();
        
        header("location:" . BASE . "/Message/index/$currentProfile->profile_id");
    }
}

?>