<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
            $fish = "trout";

            switch($fish){
                case "salmon":
                case "zalm":
                    echo "You chose salmon!<br/>";
                    break;
                case "haring":
                    echo "eat it like a dutchy!<br/>";
                    break;
                case "tuna":
                case "tonijn":
                    echo "tuna tuna!<br/>";
                    break;
                default:
                echo "ain't nobody got no time fo dat!<br/>";
            }

            $carcosts = array(
                "bmw m7" => 80000,
                "opel corsa" => 2000,
                "tesla s" => 60000,
                "porsche panamera v8" => 100000,
                "vw gold 7 gti" => 60000,
                "ford f150" => 175000,
                "dodge challenger hellcat sri" => 55000
            );

            echo $carcosts["tesla s"]."<br/>";

            echo '<table>
                <thead>
                    <tr>
                        <th>car make and model</th>
                        <th>car price</th>

                    </tr>
                </thead>
                <thbody> ';

            foreach($carcosts as $car => $price) {
                echo '<tr><td>'.$car.': </td><td>&euro; '.$price.'</td></tr>';
            }

            echo '</tbody> </table>';
        if(isset($_POST["verzend"])){
            echo 'you provided me with the name: '.$_POST["student"]."<br/>";
            echo '<a href="index.php">Reload page</a><br/>'
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="count" />
            <input type="submit" name="sendCount" value="Send the coun" />
        </form>
    </body>
</html>
