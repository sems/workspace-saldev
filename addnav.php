<?php
if( isset($_POST['nav_submit'] ) ) {
    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {

    } else {
        if(isSet ($_POST['navItem_title'])) {
            try {
                $preNavItem = $_POST['navItem_title'];
                $pageContent = $_POST['page_content'];

                // Begin writing to core-file
                $ourFileName = "$preNavItem.php";

                /*
                NOTE: THE 'w' Open for writing only; place the file pointer
                at the beginning of the file and truncate the file to zero length.
                If the file does not exist, attempt to create it.
                */
                $fileHandlePack = fopen($ourFileName, 'w') or die("can't open file");
                /*
                Starts writing to the file with fwrite([Kind of handeling], [The content]).
                */
                fwrite($fileHandlePack, '
                <?php
                    require_once "inc/package.inc.php";
                    require("inc/config.php");
                    $view = "views/'.$ourFileName.'";
                    $sectionActive = "'.$ourFileName.'";
                    include_once $template;

                ?>');
                // Closes the file
                fclose($fileHandlePack);
                // End core-file editing

                /*
                NOTE: Trying to search for the file with dirname
                in the given file Directory.
                */
                $url_destination = dirname(__FILE__).'/views/' . $ourFileName;

                $fileHandleCont = fopen($url_destination, 'w') or die ("cant't open file");
                fwrite($fileHandleCont, $pageContent);
                fclose($fileHandleCont);


                if ($_POST['addNavbar'] == '1') {
                    $navBarPlacement = 1;

                    $query = "INSERT INTO  `navitems`(`title`, `item_location`, `inNavBar`) VALUES (:navTitle, :itemLocation, :inNav)";
                    $dbinsert = $db->prepare($query);
                    $dbinsert->bindParam(':navTitle', $preNavItem, PDO::PARAM_STR);
                    $dbinsert->bindParam(':itemLocation', $ourFileName, PDO::PARAM_STR);
                    $dbinsert->bindParam(':inNav', $navBarPlacement, PDO::PARAM_STR);

                    $dbinsert-> execute();
                    $done = "De pagina is goed aangemaakt met ook in de nav!";

                } else {
                    $query = "INSERT INTO  `navitems`(`title`, `item_location`) VALUES (:navTitle, :navItemLocation)";
                    $dbinsert = $db->prepare($query);
                    $dbinsert->bindParam(':navTitle', $preNavItem, PDO::PARAM_STR);
                    $dbinsert->bindParam(':navItemLocation', $ourFileName, PDO::PARAM_STR);

                    $dbinsert-> execute();
                    $done = "De pagina is met succes aangemaakt!";
                }

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;
            }
        }
    }
}

?>
