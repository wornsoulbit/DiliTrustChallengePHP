<html>
    <head>
        <title>Outbox</title>
    </head>
    <body>
        <h4>Sent Messages:</h4>
        <form method="post" action="">

            <?php
            foreach ($data['message'] as $message) {
                $receiver_id = $message->receiver;

                foreach ($data['profile'] as $profile) {
                    if ($receiver_id == $profile->profile_id) {
                        $capitalizePrivatePublic = strtoupper($message->private_status);
                        echo "<a href='" . BASE . "/Message/outboxViewMessage/$message->message_id'>"
                        . " <b>To, $profile->first_name $profile->last_name</b>: "
                        . " [$message->timestamp]  - $capitalizePrivatePublic</a><br>$message->message<br><br>";
                    }
                }
            }
            if (empty($profile)) {
                echo "<i>You have no sent messages.</i><br><br>";
            }
            echo "<br>";
            ?>
            <a href="<?= BASE ?>/Profile/index">&#8592 Go Back to Wall</a>
        </form>
    </body>
</html>