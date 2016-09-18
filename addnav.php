<?php
    require_once "inc/package.inc.php";
    require('inc/config.php');

    $view = "views/addnav.php";

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
    {
        header('Location: /login_form');
        exit();
    } else {
        if (isSet($_POST['nav_submit'])) {
            if(isSet ($_POST['navItem_title'])) {
                try {
                    $preNavItem = $_POST['navItem_title'];
                    $pageContent = $_POST['page_content'];

                    $ourFileName = "$preNavItem.php";
                    echo $ourFileName."is uploaded with succes";
                    echo "<br/>";
                    $fileHandlePack = fopen($ourFileName, 'w') or die("can't open file");
                    fwrite($fileHandlePack, '
                    <?php
                        require_once "inc/package.inc.php";
                        require("inc/config.php");
                        $view = "views/'.$ourFileName.'";
                        include_once $template;
                    ?>');
                    fclose($fileHandlePack);


                    $url_destination = dirname(__FILE__).'/views/' . $ourFileName;
                    echo $url_destination;
                    $fileHandleCont = fopen($url_destination, 'w') or die ("cant't open file");
                    fwrite($fileHandleCont, $pageContent);
                    fclose($fileHandleCont);


                    echo "<br/>";
                    echo "<br/>";
                    if ($_POST['add_Navbar'] == 'value1') {
                        $navBarPlacement = 1;

                        $query = "INSERT  INTO  `navitems`(`title`, `item_location`, `inNavBar`) VALUES (:navTitle, :itemLocation, :inNav)";
                        $dbinsert = $db->prepare($query);
                        $dbinsert->bindParam(':navTitle', $preNavItem, PDO::PARAM_STR);
                        $dbinsert->bindParam(':itemLocation', $ourFileName, PDO::PARAM_STR);
                        $dbinsert->bindParam(':inNav', $navBarPlacement, PDO::PARAM_STR);

                        $dbinsert-> execute();
                        $done = "Het nav-item is geplaatst met succes in de db!";

                    } else {
                        
                        $query = "INSERT  INTO  `navitems`(`title`, `item_location`) VALUES (:navTitle, :navItemLocation)";
                        $dbinsert = $db->prepare($query);
                        $dbinsert->bindParam(':navTitle', $preNavItem, PDO::PARAM_STR);
                        $dbinsert->bindParam(':navItemLocation', $ourFileName, PDO::PARAM_STR);

                        $dbinsert-> execute();
                        $done = "Het nav-item is geplaatst met succes in de db!";
                    }

                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                    exit;
                }
            }
        }
    }

    include_once $template;
?>
