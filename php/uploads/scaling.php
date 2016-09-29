<?php
    // Lees: http://php.net/manual/en/book.image.php

    /**
     * Controleert de afmetingen van een afbeelding en zorgt dat ze binnen een bepaald maximum blijven.
     * De proporties van de afmetingen blijven intact
     * @param  object  $imageHandle een afbeelding die geladen is met PHP GD
     * @param  integer $maxWidth    maximum breedte
     * @param  integer $maxHeight   maximum hoogte
     * @return object  een nieuwe afbeelding die werkt met de PHP GD functies, met de nieuwe afmetingen.
     */
    function scaleImage($imageHandle, $maxWidth, $maxHeight) {
        $originalWidth  = $width  = imageSX($imageHandle); // afbeelding breedte
        $originalHeight = $height = imageSY($imageHandle); // afbeelding hoogte
        
        // Is de afbeelding hoger dan toegestaan?
        if($height > $maxHeight) {
            // Nieuwe breedte berekenen en hoogte is maximum.
            $width  = (($maxHeight / $height) * $width);
            $height = $maxHeight;
        }
        
        // Is de afbeelding breder dan toegestaan?
        if($width > $maxWidth) {
            // Nieuwe hoogte berekenen en breedte is maximum.
            $height = (($maxWidth / $width) * $height);
            $width  = $maxWidth;
        }
        
        // Nieuwe afbeelding maken van nieuwe afmetingen
        $image = imageCreateTrueColor($width, $height);
        imageAlphaBlending($image, false);
        imageSaveAlpha($image, true); // transparante kleuren ook opslaan!
        
        // Afbeelding een nieuwe afmeting geven en tekenen op de nieuwe afbeelding, zodat de oude intact blijft!
        imageCopyResampled($image, $imageHandle, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);
        
        return $image;
    }

    $bericht = false;
    if(isSet($_POST["upload"])) {
        $afbeelding = $_FILES["afbeelding"];
        if(isSet($afbeelding) && $afbeelding["error"] === 0) {
            // alles ging goed
            $name = $afbeelding["name"];
            $file = $afbeelding["tmp_name"]; // move_uploaded_file
            $size = $afbeelding["size"];
            
            $data = file_get_contents($file); // lees de inhoud van een bestand
            $gd   = @imageCreateFromString($data); // de @ onderdrukt waarschuwingen
            if($gd) {
                // nieuw formaat berekenen!
                $nieuweAfbeelding = scaleImage($gd, 500, 500); // maximaal 500x500 pixels!!
                if($nieuweAfbeelding) {
                    imageDestroy($gd); // het origineel sluiten en verder werken met de geschaalde afbeelding
                    $gd = $nieuweAfbeelding;
                }
                
                // nieuwe bestandsnaam bepalen, deze moet uniek zijn.
                $bestand = "image_".time().sha1_file($file).".png";
                
                // doelmap bepalen
                $doel = realPath("files").DIRECTORY_SEPARATOR.$bestand;
                
                // afbeelding opslaan
                imagePNG($gd, $doel);
                
                $bericht = "Bestand is geüpload als ".$bestand;
                
                // afbeelding weer sluiten
                imageDestroy($gd); 
                
                // tijdelijke upload verwijderen, die hebben we niet meer nodig.
                unlink($file);
            } else {
                $bericht = "Bestand is niet in een juist format, probeer PNG, JPEG, BMP of GIF.";
            }
        } else {
            $bericht = "Bestand niet juist geüpload, het bestand moet kleiner zijn dan 2MiB";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Afbeeldingen uploaden</title>
    </head>
    <body>
        <?php
            if($bericht !== false) {
                echo '<p>'.$bericht.'</p>';
            }
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="afbeelding" />
            <input type="submit" name="upload" value="Uploaden" />
        </form>
    </body>
</html>