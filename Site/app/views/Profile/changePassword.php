<html>
    <head>
        <title>Changing Password</title>
    </head>
    <body>
        <h4>Changing Password:</h4>
        <form method="post" action="">
            <label>Old Password: <input type="password" name="oldPassword"/></label><br>
            <label>New Password: <input type="password" name="newPassword"/></label><br>
            <label>ReType Password: <input type="password" name="reTypePassword"/></label><br><br><br>
            <input type="submit" name="action" value="Submit changes" />
        </form>
        <a href="<?= BASE ?>/Profile/index">Cancel</a>
    </body>
</html>