<?php
    require_once "inc/package.inc.php";
    require_once('inc/config.php');

    try {
        $queryNav = $db->prepare(" SELECT * FROM navitems WHERE inNavBar= 1 ");

        $queryNav-> execute();

    } catch(PDOException $e) {
        //Gives the error message if possible.
        echo "Error: " . $e->getMessage();
    }

?>
