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
        <?php session_start();
            if(!isset($_SESSION['UserData']['Username'])){
                header("location:login.php");
                exit;
            }
            ?>
            Dit is de inlog pagina van de beveiligde login! <a href="logout.php">Klik Hier!</a> om uit te loggen.
    </body>
</html>
