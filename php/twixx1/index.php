<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php twixx1</title>

    <?php

    function average($nummericList){
        $sum = 0;

        foreach($nummericList as $currentItem){
            $sum += $currentItem;
        }

        return ($sum / count($nummericList));
    }
    ?>
</head>
    <body>
    <?php
        echo "Hellooooo world!! :O <br/>";

        $MijnNaam = "naam hier";
        echo "hallo mijn naam is: ".$MijnNaam."<br/>";

        $leeftijdYoshi = 16;
        echo "yoshi is wel ".$leeftijdYoshi."jaartjes oud!<br/> ";

        if(isSet ($_GET["pagina"]) && $_GET["pagina"] === "derp") {
                echo "herp!<br/>";
        } else {
                echo "onbekende pagina<br/>";
        }

         for($i = 13; $i > 4; $i -=1)  {
             echo "huidige getalletje: " .$i."<br/>";

         }
        $tellertje = 15;
        while($tellertje <20) {
            echo "huidige waarde van while loop: ".$tellertje."<br/>";
            $tellertje += 1;
        }

        $schoolstuff = array("laptop", "arduino boek", "kennis", "arduino", "pen");
        foreach($schoolstuff as$item) {
            echo $item."<br/>";
        }
        echo '<ul>';

        for($currentIndex = 0; $currentIndex < count($schoolstuff); $currentIndex +=1){
            echo '<li>'.$schoolstuff[$currentIndex].'</li>';
        }

        echo '</ul>';

        $avgBeerindi = array(12, 10, 3, 20, 5, 6, 6, 6, 14, 3, 14, 11, 0, 11, 12, 7, 4, 0, 4, 12, 0, 1, 2);
        $avgBeer = average($avgBeerindi);
        echo "Average beer in 1A: ".$avgBeer."<br/>";
        ?>
    </body>
</html>
