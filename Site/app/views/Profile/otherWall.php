<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <a href="<?= BASE ?>/Profile/index">&#8592 Go Back To Your Wall</a><br><br>
        
        <?php
        
        $sendMessage = $data['friendProfile']->profile_id;
        echo "<a href='" . BASE . "/Message/sendMessageToProfile/$sendMessage'>(Send a Message)</a>";
        
        echo "<h2>Welcome to, " . $data['friendProfile']->first_name . " " . $data['friendProfile']->last_name .
        "'s wall" . "</h2><br><br><br>";
        echo "<u><h3>" . $data['friendProfile']->first_name . "'s Public Messages:</h3></u>";
        foreach ($data['messages'] as $messages) {
            foreach ($data['otherProfile'] as $otherProfile) {
                if ($otherProfile->profile_id == $messages->sender) {
                    echo "<b>From, " . $otherProfile->first_name . " </b>";
                    echo "<b>" . $otherProfile->last_name . ":</b> ";
                }
            }
            echo "<label>$messages->message </label>";
            echo "<b>[" . $messages->timestamp . "]</b><br>";
        }

        if (empty($messages)) {
            echo "<i>This person has no public messages.</i><br><br><br><br>";
        }

        echo "<br><br><u><h3>" . $data['friendProfile']->first_name . "'s Posts:</h3></u><br>";
        
        $tabRepeat = str_repeat("&emsp;", 10);
        
        foreach ($data['otherPictures'] as $picture) {
            echo "<b>$picture->caption</b><br><br>";
            echo "<img src='" . BASE . "/uploads/$picture->filename' width='325' height='300'/>";
            
            $likes = 0;
            foreach ($data['picture_likes'] as $picture_likes) {
                if ($picture->picture_id == $picture_likes->picture_id) {
                    $likes++;
                }
            }
            echo "<br><br><label>$likes Like(s)</label>$tabRepeat";
            echo "<a href='" . BASE . "/PictureLike/add/{$picture->picture_id}/{$data['friendProfile']->profile_id}'>LIKE</a> &#124 ";
            echo "<a href='" . BASE . "/PictureLike/delete/{$picture->picture_id}/{$data['friendProfile']->profile_id}'>UNLIKE</a><br>";
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br><br><br>";
        }

        if (empty($picture)) {
            echo "<i>This person has no posts.</i>";
        }
        ?>
    </body>
</html>