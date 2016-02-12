<!DOCTYPE html>
<?php
    define("USER_NAME", "Sem Spanhaak");

    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twixx3</title>
</head>
    <body>
        <?php
            if(!defined("USER_NAME")) {
                define("USER_NAME", "Unknown");
            }


            echo "USER_NAME: ".USER_NAME."<br/>";

            //heeft Array post send een waarde met een key voer dan de code uit!
            if(isSet($_POST["send"])) {
                $_SESSION["previouscolor"] = $_POST["colour"];
            }
            if(isSet($_SESSION["previouscolor"])) {
                echo "Previous entered colour was: ".$_SESSION["previouscolor"]."<br/>";
            }
        ?>
        <form method="post" action="index.php">
            <label for="favouriteColour">Favourite Color: </label>
            <input type="text" name="colour" id="favouritecolour"/>
            <input type="submit" name="send" value="Send!"/>
        </form>
        <?php
            include "hallo.php";
            echo "<strong>Hello World!</strong>"
        ?>
    </body>
</html>
