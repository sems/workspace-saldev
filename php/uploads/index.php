<!DOCTYPE html>
<?php
    if(isSet($_POST["upload"])) {
        if(isSet($_FILES["imagefile"])) {
            $uploadedFile = $_FILES["imagefile"];
            if($uploadedFile["error"] === 0 && $uploadedFile["size"] > 0) {
                // Verwijzing naar tijdelijk bestand
                $file     = $uploadedFile["tmp_name"];
                
                // Unieke toevoeging berekenen
                $uniqueId = uniqId();
                
                // Een hash van het bestand, of data in bestand
                $hash     = sha1_file($file);
                
                // Doelmap
                $target   = realPath("files").DIRECTORY_SEPARATOR;
                
                // Uiteindelijk pad naar bestand waar gegevens opgeslagen worden
                // opmaak: files/image_16126123-13612abcd1265123.png ongeveer.
                $output   = $target."image_".$uniqueId."-".$hash.".png";
                
                move_uploaded_file($file, $output);
                
                $bericht = "Successfully uploaded!";
            }
        }
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upload image</title>
    </head>
    <body>
        <?php
            if(isSet($bericht)) {
                echo $bericht."<br />";
            }
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="imagefile" />
            <input type="text" name="description" />
            <input type="submit" name="upload" value="Upload image" />
        </form>
    </body>
</html>