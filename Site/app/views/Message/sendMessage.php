<html>
    <head>
        <title>Send Message</title>
    </head>
    <body>
        <h4>Sending a Message:</h4>

        <form method="post" action="">
            <?php
            echo "You are sending a message to, " . $data['receiverProfile']->first_name
            . " " . $data['receiverProfile']->last_name . "<br><br>";
            ?>
            <label>Message: <br>
                <textarea name="message"><?= $data['message']->message ?></textarea>
            </label><br><br>
            <label> Private (only to them) / Public (will be visible on their wall):
                <select name="private_status">
                    <option value="private"> private </option>
                    <option value="public"> public </option>
                </select>
            </label><br><br>

            <input type="submit" name="action" value="Submit changes" />
            <br><br>

            
        </form>
        <a href="<?= BASE ?>/Profile/index">&#8592 Go Back to Your Wall</a><br><br>
        <a href="<?= BASE ?>/Profile/otherProfile/ <?= $data['receiverProfile']->profile_id ?>">
            Go to <?= $data['receiverProfile']->first_name ?> 's Wall</a>

    </body>
</html>