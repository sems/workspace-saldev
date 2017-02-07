<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/login.php";


    if(isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == true)) {
        header('Location: /controlpanel');
        exit();
    }
    include_once $template;
?>
