<?php 

namespace App\controllers;

class MessageController extends \App\core\Controller{

    function inbox($profile_id) {
        $inbox = new \App\models\Message();
        $inbox = $inbox->findAllReceived($profile_id);
        $this->view('Message/Inbox', $inbox);
    }

    function outbox($profile_id) {
        $outbox = new \App\models\Message();
        $outbox = $outbox->findAllSent($profile_id);
        $this->view('Message/Outbox', $outbox);
    }

}
?>