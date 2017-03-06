<?php
    require_once "inc/package.inc.php";
    $view = "views/logout.php";

    session_start();
    session_unset();
    session_destroy();

    header("location:/");
    exit();

    include_once $template;
?>
