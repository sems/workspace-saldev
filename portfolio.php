<?php
    require_once "inc/package.inc.php";
    require('/inc/config.php');

    $view = "/views/portfolio.php";

    try {
        $stmt = $db->prepare("SELECT title, post_Desc, date_posted, portfolio_image, id FROM portfolio ORDER BY `portfolio`.`id` DESC");
        $stmt->execute();

        echo "<script> console.log('Connection is established');</script>";

    } catch(PDOException $e) {
        //Gives the error message if possible.
         echo "Error: " . $e->getMessage();
    }

    include_once $template;
?>
