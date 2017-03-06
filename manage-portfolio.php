<?php
    require_once "inc/package.inc.php";
    require("inc/config.php");
    $view = "views/manage-portfolio.php";
    $sectionActive = null;

    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {
        header('Location: /login_form');
        exit();
    } else {
        try {
            $queryPages = $db->prepare(" SELECT * FROM portfolio WHERE deleted ='0' ORDER BY `portfolio`.`id` DESC");
            $queryPages-> execute();

            if(isset($_POST['delete_row'])) {
                $id = $_POST['id_to_be_deleted'];
                try {

                    $sqlDelSpecPage = "SELECT * FROM `portfolio` WHERE `id` = :id_toDelete";
                    $queryDelSpecPage = $db->prepare($sqlDelSpecPage);
                    $queryDelSpecPage->bindParam(':id_toDelete', $id, PDO::PARAM_STR);
                    $queryDelSpecPage-> execute();

                    while($pageRowToDel = $queryDelSpecPage->fetch( PDO::FETCH_ASSOC )) {
                        $imgPortItem = dirname(__FILE__).'/img/uploads/' .$pageRowToDel['portfolio_image'];
                        echo $imgPortItem;
                        unlink($imgPortItem);
                        echo $file;

                    }
                    
                    $sql = "UPDATE portfolio SET deleted = :del WHERE `id` = :id_to_delete";
                    $dbRowDel = $db->prepare($sql);
                    $delted = 1;
                    $dbRowDel->bindParam(':del', $delted, PDO::PARAM_STR);
                    $dbRowDel->bindParam(':id_to_delete', $id, PDO::PARAM_STR);
                    $dbRowDel-> execute();

                    header('Location: /manage-portfolio');
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
