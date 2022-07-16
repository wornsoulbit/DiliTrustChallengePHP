<html>
    <head>
        <title>Viewing Message</title>
    </head>
    <body>
        <h4>Message:</h4>
        <?php
        foreach ($data['profile'] as $profile) {
            if ($profile->profile_id == $data['message']->sender) {
                echo "<label>From: $profile->first_name</label>\n";
                echo "<label>$profile->last_name</label>\n";
            }
        }
        echo "[" . $data['message']->timestamp . "]" . "<br><br>";
        echo $data['message']->message . "<br><br>";
        ?>

        <a href="<?= BASE ?>/Message/inbox/<?= $data['currentProfile']->profile_id ?>">Back To Inbox</a>

    </body>
</html>