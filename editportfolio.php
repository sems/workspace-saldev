
<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/editportfolio.php";

    try {
        $stmt = $db->prepare('SELECT * FROM portfolio WHERE id = :id');
        $stmt->execute(array(':id' => $_GET['id']));
        $row = $stmt->fetch();

        if(isset($_POST['sub-edit-page'])) {

            if( isset($_POST['new-content'] ) && ($_POST['new-post-desc']) ) {

                $editedDesc = $_POST['new-post-desc'];
                $editedContent = $_POST['new-content'];

                $editId = $_GET['id'];
                $dbinsert = $db->prepare("UPDATE portfolio SET post = :post, post_Desc = :postdesc WHERE id = :id");
                $dbinsert->bindParam(':post', $editedContent, PDO::PARAM_STR);
                $dbinsert->bindParam(':postdesc', $editedDesc, PDO::PARAM_STR);
                $dbinsert->bindParam(':id', $editId, PDO::PARAM_STR);
                //print_r($dbinsert);
                $dbinsert->execute();
                $done = "Het item is succesvol aangepast!";
                header('Location: /manage-portfolio');
            } else {
                $done = "Er gaat iets goed mis";
            }
        }
    } catch(PDOException $e) {
        //Gives the error message if possible.
        echo "Error: " . $e->getMessage();
    };

    //if post does not exists redirect user.
    if($row['id'] == ''){
        header('Location: ./');
        exit;
    }

    include_once $template;
?>
