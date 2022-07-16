<html>
    <head>
        <title>Updating Profile</title>
    </head>
    <body>
        <h4>Editing Profile:</h4>
        <form method="post" action="">
            <label>New First name: <input type="text" name="first_name" value="<?= $data['profile']->first_name ?>" /></label><br>
            <label>New Middle name: <input type="text" name="middle_name" value="<?= $data['profile']->middle_name ?>" /></label><br>
            <label>New Last name: <input type="text" name="last_name" value="<?= $data['profile']->last_name ?>" /></label><br><br>
            
            <input type="submit" name="action" value="Submit changes" />
        </form>
        <a href="<?= BASE ?>/Profile/index">Cancel</a>
    </body>
</html>