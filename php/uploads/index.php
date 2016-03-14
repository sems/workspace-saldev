<!DOCTYPE html>
<?php
    if(isSet($_POST["upload"])) {
        if(isSet($_FILES["imagefile"])) {
            $uploadedFile = $_FILES["imagefile"];
            if($uploadedFile["error"] === 0 && $uploadedFile["size"] > 0 ) {
                $file = $uploadedFile["tmp_name"];
                $uniqueId = uniqid();
                $hash    = sha1_file($file);
                $target  = realpath("files").DIRECTORY_SEPARATOR;
                $output  = $target."image_".$uniqueId."-".$hash.".png";

                move_uploaded_file($file, $output);


            }
        }
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Images</title>
    </head>
    <body>

        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="imagefile" />
            <input type="text" name="description" />
            <input type="submit" name="upload" value="Upload image" />
        </form>
    </body>
</html>
