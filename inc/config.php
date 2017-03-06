<?php
    session_start();

    // define('DBHOST','localhost');
    // define('DBNAME','u681724605_work');
    // define('DBUSER','u681724605_admin');
    // define('DBPASS','xyVwHU5y8zA0L');

    //database credentials
    define('DBHOST','localhost');
    define('DBNAME','workspace');
    define('DBUSER','root');
    define('DBPASS','');

    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
