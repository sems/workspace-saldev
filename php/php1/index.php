<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP 1</title>
</head>
<body>
    <?php
        $naam = "Sem";
        echo $naam. "<br/>";
        echo "De lengte van naam: ".strlen($naam). "<br/>";

        $getal1 = 4;
        $getal2 = 7;
        $getal3 = 2;

        $som = $getal1 + $getal2 + $getal3;

        echo " De som is: " . $som. "<br/>";

        $gemiddelde = $som / 3;
        echo "Het gemiddelde is: " .$gemiddelde. "<br/>";

        $motto = "Simplicity is the ultimate sophistication. <br/>";

        $kop = $naam."-".$motto."<br/>";
        echo "<h1>".$kop."</h1>";

        echo "<ul>";
        for ($i = 1; $i <= 25; $i++)  {
            if (($i % 2) == 1)
                echo "<li>De onevennummers zijn: ".$i."</li><br/>";
        }
        echo "</ul>";

    ?>
</body>
</html>
