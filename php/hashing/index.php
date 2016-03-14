<!DOCTYPE html>
<?php
    function hashedPassword($username, $password) {
        return sha1($username.$password);
    }

    function hashedPassword512($username, $password) {
        return hash("sha512", $username.$password);
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hashing</title>
    </head>
    <body>
        <?php
            echo hashedPassword("bgroothedde@landstede.nl", "bloemetjes")."<br/>";
            echo sha1("bloemetjes")."<br>";
            echo sha1("bloemetjes")."<br>";
            echo hashedPassword512("bgroothedde@landstede.nl", "bloemetjes")."<br/>";
            echo hash('sha512', 'bloemetjes')."<br>";
        ?>
    </body>
</html>
