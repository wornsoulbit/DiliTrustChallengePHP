<html>
    <head>
        <title>List of Profiles</title>
    </head>
    <body>
        <?php
        echo '<b>Results for search, "<i>' . $data['keyword'] . '</i>":</b><br><br>';
        foreach ($data['profiles'] as $profiles) {
            echo "<a href='" . BASE . "/Profile/otherProfile/$profiles->profile_id'>"
            . "$profiles->first_name $profiles->middle_name $profiles->last_name</a>&emsp;";
            echo "<a href='" . BASE . "/Message/sendMessageToProfile/$profiles->profile_id'>(Send a Message)</a>";
        }

        if (empty($profiles)) {
            echo 'No profile contains the name, "' . $data['keyword'] . '". (Please input a first, middle or last name)';
        }
        echo "<br><br><br>";
        ?>

        <a href="<?= BASE ?>/Profile/index">&#8592 Go Back to Wall</a>
    </body>
</html>




