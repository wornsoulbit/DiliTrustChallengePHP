<html>
    <head>
        <title>Inbox</title>
    </head>
    <body>
        <h4>Your Inbox:</h4>
        <form method="post" action="">
            <?php
            foreach ($data['message'] as $message) {
                $sender_id = $message->sender;

                foreach ($data['profile'] as $profile) {
                    if ($sender_id == $profile->profile_id) {
                        // to capitalize
                        $capitalizeReadUnread = strtoupper($message->read_status);
                        $capitalizePrivatePublic = strtoupper($message->private_status);
                        echo "$capitalizeReadUnread - ";
                        echo "<a href='" . BASE . "/Message/inboxViewMessage/$message->message_id'>"
                        . " <b>From, $profile->first_name $profile->last_name</b>:"
                        . " [$message->timestamp] || <b style='font-size:13px'>$capitalizePrivatePublic</b></a>&emsp;<br>$message->message ";
                    }
                }
                echo "&mdash; <a style='font-size:13px' href='" . BASE . "/Message/reRead/$message->message_id'>SET TO REREAD</a> ";
                echo "&mdash; <a style='font-size:13px' href='" . BASE . "/Message/delete/$message->message_id'>(DELETE)<br><br></a>";
            }

            if (empty($profile)) {
                echo "<i>You have no messages.</i><br><br>";
            }
            echo "<br>";
            ?>

            <a href="<?= BASE ?>/Profile/index">&#8592 Go Back to Wall</a>
        </form>
    </body>
</html>