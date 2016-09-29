<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP 2</title>
        <style type="text/css">
            body { background:
            <?php
                switch ($_GET['color']) {
                    case 'red':
                        echo '#ff0000';
                        break;
                    case 'green':
                        echo '#00ff00';
                        break;
                    case 'blue':
                        echo '#0000ff';
                        break;
                    case 'yellow':
                        echo '#ffff00';
                        break;
                    case 'purple':
                        echo '#ff00ff';
                        break;
                    default:
                        echo '#ffffff';
                        break;
                };
            ?>
            ;}
        </style>
    </head>
    <body>
        <?php
            $typeOfHouses = array(
                "villa" => 800000,
                "detached" => 600000,
                "castle" => 1200000,
                "apartment" => 200000,
                "bungalow" => 400000,
                "semi-detached" => 450000,
            );
            echo '<table>
                <thead>
                    <tr>
                        <th>Type of house</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                <thbody> ';

            foreach($typeOfHouses as $house => $price) {
                echo '<tr><td>'.$house.': </td><td>&euro; '.$price.'</td></tr>';
            }

            echo '</tbody> </table>';


        ?>
        <!-- Opdracht 5-->
        <form action="index.php" name="optellen" method="get">
            <h3>Optellen </h3>
            <input type="hidden" name="actie" value="optellen"/>
            Number 1: <input required type="number" name="number1" id="number1"/>
            number 2: <input required type="number" name="number2" id="number2"/>
            <input type="submit" value="send">
        </form>
        <?php
            if (isset($_GET['actie'])) {
                if($_GET['actie'] === 'optellen') {
                    if(isset($_GET['number1']) && isset($_GET['number2'])) {
                        echo "De uitkomst is: ".($_GET['number1'] + $_GET['number2'])."<br/>";
                    }
                }
            }
        ?>
        <br/>
        <form action="index.php" method="get">
            <h3>Gemiddelde: </h3>
            <input type="hidden" name="actie" value="gemiddelde">
            Number 1 <input required type="number" name="number1" id="number1">
            Number 2 <input required type="number" name="number2" id="number2">
            Number 3 <input required type="number" name="number3" id="number3">
            Number 4 <input required type="number" name="number4" id="number4">
            <input type="submit" value="send">
        </form>
        <?php
            if (isset($_GET['actie'])) {
                if($_GET['actie'] === 'gemiddelde') {
                    $numb1 = $_GET['number1'];
                    $numb2 = $_GET['number2'];
                    $numb3 = $_GET['number3'];
                    $numb4 = $_GET['number4'];

                    if(isset($numb1, $numb2, $numb3, $numb4)) {
                        echo "De uitkomst is: ".(($numb1 + $numb2 + $numb3 + $numb4)/4)."<br/>";
                    }
                }
            }
        ?>
        <form action="index.php" method="get" >
            <h3>De wet van Ohm:</h3>
            <input type="hidden" name="actie" value="ohm" />
            U: <br/> <input type="number" name="tension" id="tension" /> V <br/>
            I: <br/> <input type="number" name="power" id="power" /> A <br />
            R: <br/> <input type="number" name="resistance" id="resistance" /> &#8486;<br/>
            <input type="submit" value="Calculate!" />
        </form>
        <?php
            if(isset($_GET['actie'])) {
                if($_GET['actie'] === 'ohm') {

                    $waarden = array('tension', 'power', 'resistance');
                    $ingevuld = '';
                    $empty = '';
                    foreach($waarden as $eenheid) {
                        if(!isset($_GET[$eenheid]) || empty($_GET[$eenheid])) {
                            $empty = $eenheid;
                        } else {
                            switch ($eenheid) {
                                case 'power':
                                    $i = $_GET['power'];
                                    $ingevuld += 1;
                                    break;
                                case 'tension':
                                    $u = $_GET['tension'];
                                    $ingevuld += 1;
                                    break;
                                case 'resistance':
                                    $o = $_GET['resistance'];
                                    $ingevuld += 1;
                                    break;
                                default:
                            }
                        }
                    }

                    if($ingevuld == 2) {
                        switch ($empty) {
                            case 'power':
                                echo 'De power (I) is: '.($u / $o).'<br/>';
                                break;
                            case 'tension':
                                echo 'De tension (U) is: '.($i * $o).'<br/>';
                                break;
                            case 'resistance':
                                echo  'De resistance (&#8486;) is: '.($u / $i).'<br/>';
                                break;
                            default:
                                echo '--';
                        }
                    } else if ($ingevuld == 0) {
                        echo "Vul twee waarden in om de onberekende te berekenen!<br/>";
                    } else {
                        echo "Vul minimaal twee waarden in<br/>";
                    }
                }
            }
        ?>
    </body>
</html>
