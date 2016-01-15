<?php

        //Opdracht 12

        function toonN($lijstNummers, $n) {
            foreach($lijstNummers as $huidigNummer) {
                if(($huidigNummer % $n) === 0) {
                    echo $huidigNummer."<br/>";
                }
            }
        }

        function htmlKop () {
            '<!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <title>PHP 1</title>
                            </head>
                            <body>';
        }

        function htmlVoet () {
            '</body> </html>';
        }

        htmlKop();
        // K.I.S.S Keep It Simple, Stupit!
        // DRY Don't repeat yourself
        //Opdracht 3
        $naam = "Sem Spanhaak";

        //Opdracht 3
        echo "Mijn Naam is: ".$naam. "<br/>";

        //Opdracht 4
        echo "De lengte van naam: ".strLen($naam). "<br/>";

        // Opdracht 5
        $getal1 = 4;
        $getal2 = 7;
        $getal3 = 2;

        $som = ($getal1 + $getal2 + $getal3);

        echo " De som is: " . $som. "<br/>";
        //Opdracht 6
        $gemiddelde = $som / 3;
        echo "Het gemiddelde is: " .$gemiddelde. "<br/>";

        //Opdracht 7
        $motto = "Simplicity is the ultimate sophistication. <br/>";

        // Opdracht 8
        $kop = $naam."-".$motto."<br/>";

        //Opdracht 9
        echo "<h1>".$kop."</h1>";

        //Opdracht 10
        echo "<ul>";
        for ($i = 1; $i <= 25; $i++)  {
            if (($i % 2) !== 0) {
                echo "<li>".$i."</li>";
            }
        }
        echo "</ul>";

        //Opdracht 11

        $arrAnimals = array("Horse", "Cat", "Doge", "Dog", "Mouse", "Piggy", "Chicken", "Fish");
        $strAnimals = "";
        foreach($arrAnimals as $index => $item) {
            if($index !== 0 ) {
                $strAnimals.= " - ";
            }
            $strAnimals.= $item. "-";
        }
        echo $strAnimals."<br/>";

        echo "<br/>";

        //Opdracht 13
        $lijstNummers = array(1,332, 24, 12, 6, 96, 6, 23, 323, 65, 23, 85, 12, 43, 43, 26, 74, 82, 82 , 92);
        toonN($lijstNummers, 6);

        echo "<br/> Opdracht 16 <br/>";


        $aveNummers = array_sum($lijstNummers) / count($lijstNummers);
        echo $aveNummers;

        htmlVoet();


    ?>
