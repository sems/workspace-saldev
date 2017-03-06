<?php
require_once "inc/package.inc.php";
require("inc/config.php");

    $view = "/views/manage-users.php";
    $sectionActive = null;

    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {
        header('Location: /login_form');
        exit();
    } else {
        try {
            $queryPages = $db->prepare(" SELECT * FROM users ");
            $queryPages-> execute();

            // Als de delete row is pressed
            if(isset($_POST['delete_row'])) {
                $id = $_POST['id_to_be_deleted'];
                echo $id;
                try {

                    $sqlDelSpecPage = "SELECT * FROM `users` WHERE `id` = :id_toDelete";
                    $queryDelSpecPage = $db->prepare($sqlDelSpecPage);
                    $queryDelSpecPage->bindParam(':id_toDelete', $id, PDO::PARAM_STR);
                    $queryDelSpecPage-> execute();

                    $sql = "DELETE FROM `users` WHERE `id` = :id_to_delete";
                    $dbRowDel = $db->prepare($sql);
                    $dbRowDel->bindParam(':id_to_delete', $id, PDO::PARAM_STR);
                    $dbRowDel-> execute();

                    header('Location: /manage-users');
                } catch(PDOException $e) {
                    //Gives the error message if possible.
                    echo "Error in deleting: " . $e->getMessage();
                }
            }

        } catch(PDOException $e) {
            //Gives the error message if possible.
            echo "Error in getting all information: " . $e->getMessage();
        }
    }
    include_once $template;
?>
