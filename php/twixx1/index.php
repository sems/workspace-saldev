<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP Twixx 1</title>
    </head>
    <body>
   <?php
        echo "<strong>Hello World!!</strong><br />";

        $mijnnaam = "Kevin Wessels";
        echo "Hallo, mijn naam is: ".$mijnnaam."<br />";

        $leeftijdYoshi = 16;
        echo "Yoshi is wel ".$leeftijdYoshi."jaartjes oud!<br />";

            if(isSet($_GET["pagina"]) && $_GET["pagina"] === "derp") {
            echo "herp!<br />";
        } else {
            echo "onbekende pagina<br />";
        }

        for($i = 13; $i > 4; $i -=1) {
            echo "Huidig getalletje: ".$i."<br/>"
        }
    ?>
    </body>
</html>
