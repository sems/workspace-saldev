<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/controlpanel.php";


    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
    {
        header('Location: /login_form');
        exit();
    } else {
        $loggedIn = 'Welkom '.$_SESSION['gebruiker'].', wat leuk dat je er weer bent.';
    }

    include_once $template;
?>
