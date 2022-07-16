<html>
    <head>
        <title>Login validation</title>
    </head>
    <body>
        Validate your login by providing your 6-digit passcode.
        <form method="post" action="">
            <label>Current code:<input type="text" name="currentCode" /></label>
            <input type="submit" name="action" value="Verify code" />
        </form>
        <a href="<?= BASE ?>/Login/login">&#8592 Go Back to Login</a>
    </body>
</html>