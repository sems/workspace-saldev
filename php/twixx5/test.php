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
            $query = $connection->prepare("
            SELECT Code, Name, Continent, Region, LifeExpectancy
            FROM `country`
            WHERE LifeExpectancy => :life");

            $query->bindValue(":life", $_GET["life"], PDO::PARAM_INT);
            if($query->execute()) {
                while($countryLife = $query->fetch()) {
                    echo "Code is".$countryLife["LifeExpectancy"]."<br/>";
                    }
                }else {
                    echo "et is kapoet";
                }

        ?>
    </body>
</html>
