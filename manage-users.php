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
            $queryPages = $db->prepare(" SELECT * FROM users WHERE deleted ='0'");
            $queryPages-> execute();

            // Als de delete row is pressed
            if(isset($_POST['delete_row'])) {
                $id = $_POST['id_to_be_deleted'];
                try {

                    $sql = "UPDATE users SET deleted = :del WHERE `id_user` = :id_to_delete";
                    $dbRowDel = $db->prepare($sql);
                    $delted = 1;
                    $dbRowDel->bindParam(':del', $delted, PDO::PARAM_STR);
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
