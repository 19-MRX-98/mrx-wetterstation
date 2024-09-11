<?php

    //Dieses Script überwacht die HTTP Anfragen auf den Webserver und schreibt diese Informationen in die Datenbank
    //require 'src/php/analog/lib/Analog.php';
    require_once("/var/www/html/src/conf/analog_conf.php");
    //Angefragte URL
    $uri = $_SERVER['REQUEST_URI'];
    $client= $_SERVER['REMOTE_ADDR'];
    #####
    $path="/var/www/html/src/conf/";
    $pdo=new PDO("mysql:host=$analog_dbsrv;dbname=$analog_db", $analog_db_username, $analog_db_password);
    Analog::handler (Analog\Handler\PDO::init (
                $pdo,  // PDO connection object
                $table=$analog_log_tbl // database table name
            ));
    Analog::handler (Analog\Handler\PDO::init ($pdo, $table));
        switch ($uri) {
            case "/": 
                Analog::log("PHP Router:Basispfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/weather_today":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/actual_year":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/jahr2023":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/jahr2022":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/rain":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/rain23":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/gruenlandtemperatur":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/about":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            case "/api":
                Analog::log("PHP Router:Pfad angefragt URI= $uri", Analog::INFO);
            break;
            default:
                Analog::log("PHP Router: Error | PATH_UNKNOWN", Analog::ERROR);
            }
    Analog::log("Neue IP Client Verbindung erkannt: $client", Analog::INFO);
        // Cleanup
        $pdo = null;
?>