<!DOCTYPE html>
<?php
    //PDO is een klasse, new pdo maakt een boject van klasse PDO(blauwdruk)
    try {
        $connection = new PDO("mysql:host=localhost;dbname=world","testaccount", "testpassword");
        echo "The connection is estemblist";
    }catch (PDOException $exception) {
        echo "Ouch I cant connect for some reason";
        exit;
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
            $query = $connection->prepare("SELECT CountryCode, Name FROM `city` WHERE CountryCode = 'NLD'");

            if($query->execute()) {
                $rowCount = $query->rowCount();
                if($rowCount !== 0){
                    echo 'The Query resulted in '.$rowCount.' rows!<br/>';

                    //fetch all
                    /* foreach($query->fetchAll() as $city) {
                        echo $city["CountryCode"].": ".$city["Name"]."<br/>";
                    } */

                    while($city = $query->fetch()) {
                        echo $city["CountryCode"].": ".$city["Name"]."<br/>";

                    }
                } else {
                    echo 'No results! <br/>';
                }
            } else {
                print_r($query->errorInfo());
            }

        $connection = null;
        ?>
    </body>
</html>
