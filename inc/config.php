<?php
    session_start();

    define('DBHOST','localhost');
    define('DBNAME','studentdb_sspanhaak');
    define('DBUSER','sspanhaak');
    define('DBPASS','NtxeTVL6RCGtWN82');

    // //database credentials
    // define('DBHOST','localhost');
    // define('DBNAME','workspace');
    // define('DBUSER','root');
    // define('DBPASS','');

    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>