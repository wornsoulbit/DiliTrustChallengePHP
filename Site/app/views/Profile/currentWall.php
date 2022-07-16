<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Search for a profile: <input type="text" name="keyword"/></label>
            <?php
            echo str_repeat("&emsp;", 10);
            ?>
            <a href="<?= BASE ?>/Profile/edit/<?= $data['profile']->profile_id ?>">Modify Your Profile</a> &ndash;
            <a href='<?= BASE ?>/Default/editPassword'>Change Password</a> &ndash;
            <a href='<?= BASE ?>/Default/logout'>Logout</a> 
            <br>

            <input type="submit" name="action" value="Search!" />
        </form>

        <a href="<?= BASE ?>/Message/index/<?= $data['profile']->profile_id ?>">Go To Inbox</a> &#124
        <a href="<?= BASE ?>/Message/outbox/<?= $data['profile']->profile_id ?>">Go To Outbox</a><br><br>
        <a href="<?= BASE ?>/Picture/add">Upload a picture</a><br><br>

        <?php
        echo "<br><h2>Welcome to your wall, " . $data['profile']->first_name .
        " " . $data['profile']->last_name . "! </h2><br><br>";
        echo "<u><h3>All Your Messages:</h3></u>";
        foreach ($data['messages'] as $messages) {
            foreach ($data['otherProfile'] as $otherProfile) {
                if ($otherProfile->profile_id == $messages->sender) {
                    echo "<b>From, " . $otherProfile->first_name . " </b>";
                    echo "<b>" . $otherProfile->last_name . ":</b> ";
                }
            }
            echo "<label>$messages->message</label>";
            echo "<b> - " . $messages->timestamp . "</b>";
            $capitalizePrivatePublic = strtoupper($messages->private_status);
            echo "<b> (" . $capitalizePrivatePublic . ")</b> <br>";
        }

        if (empty($messages)) {
            echo "<i>You have no public messages.</i><br><br><br>";
        }

        echo "<br><br><u><h3>Your Posts:</h3></u><br>";

        $notice_count = 0;
        foreach ($data['pictures'] as $allPictures) {
            foreach ($data['picture_likes'] as $picture_likes) {
                if ($allPictures->picture_id == $picture_likes->picture_id &&
                        $picture_likes->read_status == "unseen") {
                    $notice_count++;
                }
            }
        }

        if ($notice_count != 0) {
            echo "<a href='" . BASE . "/Picture/index/'><h3>($notice_count New likes!)</h3></a><br>";
        }

        $tabRepeat = str_repeat("&emsp;", 10);

        foreach ($data['pictures'] as $picture) {
            echo "<b>$picture->caption </b><br><br>";
            echo "<img src='" . BASE . "/uploads/$picture->filename' width='325' height='300'/><br><br>";
            $likes = 0;
            foreach ($data['picture_likes'] as $picture_likes) {
                if ($picture->picture_id == $picture_likes->picture_id) {
                    $likes++;
                }
            }
            echo "<label>$likes Like(s)$tabRepeat</label>";
            echo "<a href='" . BASE . "/Picture/edit/$picture->picture_id'>EDIT</a> &#124 ";
            echo "<a href='" . BASE . "/Picture/delete/$picture->picture_id'>DELETE</a><br>";
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br><br><br>";
        }

        if (empty($picture)) {
            echo "<i>You have no posts.</i>";
        }
        ?>
    </body>
</html>

