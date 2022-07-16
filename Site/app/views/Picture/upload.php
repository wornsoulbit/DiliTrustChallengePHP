<html>
    <head><title>Upload an image file</title>
    </head>
    <body>

        <h4>Uploading an Picture</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Caption: <input type="text" name="caption" /></label><br />
            <label>Select an image file to upload: <input type= "file" name="myImage" /></label><br>
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Profile/index">Cancel</a>
    </body>
</html>