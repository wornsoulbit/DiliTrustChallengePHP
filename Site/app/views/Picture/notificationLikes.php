<html>
    <head>
        <title>list of all pictures in the database</title>
    </head>
    <body>
        <h4>Like Notifications:</h4>
        <?php
        foreach ($data['pictures'] as $picture) {
            $like_count = 0;
            foreach ($data['picture_likes'] as $likes) {
                if ($picture->picture_id == $likes->picture_id && $likes->read_status == "unseen") {
                    $like_count++;
                }
            }

            if ($like_count != 0) {
                echo "$picture->caption <br> <img src='" . BASE . "/uploads/$picture->filename' "
                . "width='250' height='250' /><br>"
                . "<b>$like_count New Like(s)</b><br><br><u>Who Liked This Picture?</u><br>";
                foreach ($data['getNameLikes'] as $nameLikes) {
                    foreach ($data['picture_likes'] as $likes) {
                        if ($picture->picture_id == $likes->picture_id && $likes->read_status == "unseen") {
                            if ($nameLikes->profile_id == $likes->profile_id) {
                                echo "<b>$nameLikes->first_name $nameLikes->last_name </b> @ [$likes->timestamp]<br>";
                            }
                        }
                    }
                }
            }
        }
        ?>
        <a href="<?= BASE ?>/Profile/index"><br>&#8592 Go Back to Wall</a>
    </body>
</html>