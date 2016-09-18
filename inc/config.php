<?php
    session_start();
    /*
        pwd: NtxeTVL6RCGtWN82
    */
    //database credentials
    //define('DBHOST','localhost');
    //define('DBNAME','studentdb_sspanhaak');
    //define('DBUSER','sspanhaak');
    //define('DBPASS','NtxeTVL6RCGtWN82');

    $servername = "localhost";
    $username = "sspanhaak";
    $password = "NtxeTVL6RCGtWN82";
    
    $db = new PDO("mysql:host=$servername;dbname=studentdb_sspanhaak", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
?>