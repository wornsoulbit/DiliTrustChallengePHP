<html>
    <head>
        <title>Edit picture</title>
    </head>
    <body>
        <form method="post" action="">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' /><br />
            <label>Alt text: <input type="text" name="alt" value="<?= $data->alt ?>" /></label><br />
            <label>Description: <input type="text" name="description" value="<?= $data->description ?>" /></label><br />

            <input type="submit" name="action" value="Submit changes" />
        </form>
        <a href="<?= BASE ?>/Picture/index">Cancel</a>
    </body>
</html>