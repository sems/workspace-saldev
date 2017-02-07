<?php
    if( isset($_POST['submitAddItem'] ) ) {

        if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {
            
        } else {
            if(isSet($_FILES["imagefile"])) {
                $uploadedFile = $_FILES["imagefile"];
                if($uploadedFile["error"] === 0 && $uploadedFile["size"] > 0) {
                    // Verwijzing naar tijdelijk bestand.
                    $file     = $uploadedFile["tmp_name"];
                    // Unieke toevoeging berekenen.
                    $uniqueId = uniqId();
                    // Een hash van het bestand, of data in bestand.
                    $hash     = sha1_file($file);
                    $output   = realPath("/img".DIRECTORY_SEPARATOR."uploads");
                    $filename = "image_".$uniqueId."-".$hash.".png";

                    move_uploaded_file($file, $output.DIRECTORY_SEPARATOR.$filename);
                    $bericht = "De afbeelding is geupload met succes!";
                }
            }
            //controleert of de 'submit' knop is geklikt.
            //controleert of alle inputs zijn ingevuld.
            if(isSet ($_POST['title']) && ($_POST['portfolio_content'])) {
                try {
                    //haalt 'subject' uit formulier.
                    $title = $_POST['title'];
                    $post = $_POST['portfolio_content'];
                    $postDesc = substr($_POST['portfolio_content'],0,940);

                    // If there is a file in the input then run the following code:
                    if($uploadedFile["error"] === 0 && $uploadedFile["size"] > 0) {
                        //The query for the blogpost when there *is* a image present.
                        $queryIMG = "INSERT INTO `portfolio`(`title`, `post`, `portfolio_image`, `post_desc`) VALUES (:title, :post, :portf_img, :postdesc)";
                        //The connection for the image will be prepared.
                        $dbinsertIMG = $db->prepare($queryIMG);
                        $dbinsertIMG->bindParam(':portf_img', $filename, PDO::PARAM_STR);
                        $dbinsertIMG->bindParam(':title', $title, PDO::PARAM_STR);
                        $dbinsertIMG->bindParam(':post', $post, PDO::PARAM_STR);
                        $dbinsertIMG->bindParam(':postdesc', $postDesc, PDO::PARAM_STR);

                        //print_r($dbinsertIMG);
                        $dbinsertIMG->execute();

                        $doneImg = "Het item is geplaatst met afbeelding";
                    } else {
                        //The query for the blogpost when there isn't a image
                        $query = "INSERT INTO `portfolio`(`title`, `post`, `post_desc`) VALUES (:title, :post, :postdesc )";
                        //Bereid de SQL query voor voor het onderwerp en de titel
                        $dbinsert = $db->prepare($query);
                        $dbinsert->bindParam(':title', $title, PDO::PARAM_STR);
                        $dbinsert->bindParam(':post', $post, PDO::PARAM_STR);
                        $dbinsert->bindParam(':postdesc', $postDesc, PDO::PARAM_STR);

                        //print_r($dbinsert);
                        $dbinsert->execute();
                        $done = "Het item is geplaatst met succes!";
                    }
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                    exit;
                }
            }

        }
    }
?>
