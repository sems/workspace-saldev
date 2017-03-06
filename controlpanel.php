<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/controlpanel.php";
    $sectionActive = "controlpanel";

    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false)) {
        header('Location: /login');
        exit();
    } else {
        $loggedInMess = 'Welkom '.$_SESSION['gebruiker'].', wat leuk dat je er weer bent.';
        include "email_change.php";
        include "password_change.php";
        include "additem.php";
        include "addnav.php";
    }

    include_once $template;
?>
