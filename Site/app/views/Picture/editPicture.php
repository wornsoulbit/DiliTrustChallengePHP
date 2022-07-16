<html>
    <head>
        <title>Edit picture</title>
    </head>
    <body>
        <h4>Editing Picture:</h4>
        <form method="post" action="">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='325' height='300'/><br><br>
            <label>New Caption: <input type="text" name="caption" size="50" value="<?= $data->caption ?>" /></label><br><br>
            <input type="submit" name="action" value="Submit changes" /><br><br>
        </form>
        <a href="<?= BASE ?>/Profile/index">Cancel</a>
    </body>
</html>