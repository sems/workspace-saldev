<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php
            define("WEBSITE_TITEL", "<title> Dit is een titel </title>");
            echo WEBSITE_TITEL;
        ?>
    </head>
    <body>
        <?php
            session_start();
            session_destroy();
            header("location:login.php");
            exit;
        ?>
    </body>
</html>
