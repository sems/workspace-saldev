<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/main.css" />
        <link rel="shortcut icon" href="/img/logo_icon.png">
        <link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
        <script src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <!-- <script type="text/javascript" src="js/klassenlijst.js"></script> -->
        <script type="text/javascript" src="/js/todo.js"></script>
    </head>
    <body>
        <?php include_once("analyticstracking.php") ?>
        <nav>
            <ul>
                <li class="brand brand-Desktop"><h1>Sem!</h1></a></li>
                <li class="nav-items nav-Mobile"><a href="/"><h1>Home</h1></a></li>
                <li class="nav-items"><a href="/about">About</a></li>
                <li class="nav-items"><a href="/cv">CV</a></li>
                <li class="nav-items"><a href="/portfolio">Portfolio</a></li>
                <?php
                    require_once "/navitems.php";

                    while($rowNav = $queryNav->fetch( PDO::FETCH_ASSOC )) {
                            echo "<li class='nav-items'><a href=/".$rowNav['title'].">".$rowNav['title']."</a></li>";
                    }
                ?>
                <li class="nav-items"><a href="/contact">Contact</a></li>
                <?php
                    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) { }else {
                        echo "<li class='nav-items'><a href='/controlpanel'>CP</a></li>";
                        echo "<li class='nav-items'><a href='/logout'>Logout</a></li>";
                    };
                ?>
            </ul>
        </nav>

        <div class="container">
                <?php
                    include $view;
                ?>
        </div>

        <div class="footer">
            <div class="content-footer">
                <ul class="footer-links">
                    <li class="footer-link"><a href="/contact">Contact</a> </li>
                    <li class="footer-link"><a class="footer-social-link" target="_blank" href="http://twitter.com/semspanhaak">Twitter</a> </li>
                    <li class="footer-link"><a class="footer-social-link" target="_blank" href="http://youtube.com/user/delol2010">Youtube</a> </li>
                    <li class="footer-link"><a class="footer-social-link" target="_blank" href="http://facebook.com/semspanhaak.1">Facebook</a> </li>
                    <li class="footer-link"><a class="footer-social-link" target="_blank" href="https://plus.google.com/115118023109445979062">Google</a> </li>
                    <li class="footer-link"><a class="footer-social-link" target="_blank" href="http://instagram.com/se.m.m">Instagram</a> </li>
                </ul>

            </div>
        </div>

    </body>
</html>
