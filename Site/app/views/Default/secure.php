<html>
    <head><title>This is somewhere secure</title></head>
    <body>
        <p>Welcome to somewhere secure... 
            <?= $_SESSION['username'] ?></p>

        <p><a href='<?= BASE ?>/Picture/'>Picture management</a></p>
        <p><a href='<?= BASE ?>/Default/logout'>Logout</a></p>
    </body>
</html>