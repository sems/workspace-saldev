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

        $animals = array("Horse", "Cat", "Doge", "Dog", "Mouse", "Piggy", "Chicken", "Fish");

        foreach($animals as$item) {
            echo $item."<br/>";
        }

        echo "<br/>"

        function toonN($lijstNummers, $n){
            $lijstNummers = array(1,332,24,12,6,96, 6, 23, 323, 65, 23, 85, 12, 43, 43);
            $n = 6;
            foreach($lijstNummers as $number) {
                if (($number % $n) === 0)
                    echo "Nummer deelbaar door ".$n." zijn: ".$number."<br/>";
                }
        }

        toonN(6, 5);



    ?>
</body>
</html>
