<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/editpage.php";


    try {
        $stmt = $db->prepare('SELECT * FROM navitems WHERE id = :id');
        $stmt->execute(array(':id' => $_GET['id']));
        $row = $stmt->fetch();

        if(isset($_POST['sub-edit-page'])) {
            $ourFileName = $row['item_location'];
            $editedContent = $_POST['new-content'];

            $url_destination = dirname(__FILE__).'/views/' . $ourFileName;
            $contentEditFile = file_get_contents($url_destination);

            $fileHandleCont = fopen($url_destination, 'w') or die ("cant't open file");
            fwrite($fileHandleCont, $editedContent);
            fclose($fileHandleCont);
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
