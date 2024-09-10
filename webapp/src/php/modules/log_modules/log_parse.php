<?php
    require 'src/php/analog/lib/Analog.php';
    require_once("/var/www/html/src/conf/analog_conf.php");

    $path="src/misc";
    $pdo=new PDO("mysql:host=$analog_dbsrv;dbname=$analog_db", $analog_db_username, $analog_db_password);
    Analog::handler (Analog\Handler\PDO::init (
                $pdo,  // PDO connection object
                $table=$analog_log_tbl // database table name
            ));


    if (file_exists("$path/LICENSE")){
        Analog::handler (Analog\Handler\PDO::init ($pdo, $table));
        // Log some messages
        Analog::log("APP: Lizenzdatei wurde erfolgreich geladen",Analog::INFO);
        // Cleanup
        $pdo = null;
    }
    else{
        Analog::log("APP: Lizenzdatei nicht gefunden unter: $path",Analog::EMERGENCY);
    } 

?>