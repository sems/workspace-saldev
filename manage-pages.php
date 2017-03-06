    <?php
    require_once "inc/package.inc.php";
    require("inc/config.php");

        $view = "/views/manage-pages.php";
        $sectionActive = null;

        if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {
            header('Location: /login_form');
            exit();
        } else {
            try {
                $queryPages = $db->prepare(" SELECT * FROM navitems WHERE deleted ='0' ");
                // $notDel = 0;
                // $queryPages->bindParam(':isnotDel', $notDel, PDO::PARAM_STR);
                $queryPages-> execute();


                if(isset($_POST['delete_row'])) {
                    $id = $_POST['id_to_be_deleted'];
                    try {

                        $sqlDelSpecPage = "SELECT * FROM `navitems` WHERE `id` = :id_toDelete";
                        $queryDelSpecPage = $db->prepare($sqlDelSpecPage);
                        $queryDelSpecPage->bindParam(':id_toDelete', $id, PDO::PARAM_STR);
                        $queryDelSpecPage-> execute();

                        while($pageRowToDel = $queryDelSpecPage->fetch( PDO::FETCH_ASSOC )) {
                            echo $pageRowToDel['item_location'];
                            $file = dirname(__FILE__).'/views/' .$pageRowToDel['item_location'];
                            $viewOfFile = $pageRowToDel['item_location'];
                            unlink($file);
                            unlink($viewOfFile);
                            echo $file;
                        }

                        $sql = "UPDATE navitems SET deleted = :del WHERE `id` = :id_to_delete";
                        $dbRowDel = $db->prepare($sql);
                        $delted = 1;
                        $dbRowDel->bindParam(':del', $delted, PDO::PARAM_STR);
                        $dbRowDel->bindParam(':id_to_delete', $id, PDO::PARAM_STR);
                        $dbRowDel-> execute();

                        header('Location: /manage-pages');
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
