<html>
    <head>
        <title>list of all pictures in the database</title>
    </head>
    <body>
        <a href="<?= BASE ?>/Picture/add">Add a new picture</a>
        <table>
            <tr><th>picture_id</th><th>image</th><th>alt text</th><th>description</th><th>actions</th></tr>
            <?php
            foreach ($data as $picture) {
                echo "<tr><td>$picture->picture_id</td>
	<td><img src='" . BASE . "/uploads/$picture->filename' alt='$picture->alt' /></td>
	<td>$picture->alt</td>
	<td>$picture->description</td>
		<td><a href='" . BASE . "/Picture/delete/$picture->picture_id'>delete</a>,
			<a href='" . BASE . "/Picture/edit/$picture->picture_id'>edit</a>,
		</td></tr>";
            }
            ?>
        </table>
    </body>
</html>