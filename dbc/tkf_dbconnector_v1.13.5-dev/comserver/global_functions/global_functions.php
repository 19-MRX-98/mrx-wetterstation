<?php
        $ini = parse_ini_file("/tkf_com/conf/comserver.ini");
        /*Datenbanknamen müssen erstmal hier angegebene werden */
        date_default_timezone_set('Europe/Berlin');

        $database = $ini["database"];
        $tkf_adm= "tkf_admin";
        $dbsrv = $ini["db_host"];
        $dbuser= $ini["db_username"];
        $dbport= $ini["db_port"];
        $passwd = $ini["db_password"];
        $message='';
        $logfile = $ini["log_file"];
        $connection_timeout=$ini["db_healthcheck_timeout"]; //Timeout in Sekunden

        //Konstanten

        define('umrechnung_temp', 10);
        define('umrechnung_wind1',10);
        define('umrechnung_wind2',3.6);
        define('umrechnung_wind_spitzen1',10);
        define('umrechnung_wind_spitzen2',3.6);
        define('umrechnung_niederschlag',10);
        define('niederschlagsdifferenz',0.6);
        define('umrechnung_luftdruck',1000);
                

        /* Funktion zum Logfile erstellen */
        function logs($message,$logfile,$error_level = 'INFO'){

            $logfile = "/tkf_com/logs/dbc_log.log";
            $date_time = date("Y-m-d H:i:s");
            $formatted_message = "[$date_time]-->[$error_level]-->[$message]\n";
            file_put_contents($logfile, $formatted_message, FILE_APPEND);

        }
        logs($message,$logfile);
/*$logfile = "/tkf_com/logs/dbc_log.log"; */

        /* Funktion zum Verbinden zur Admin Datenbank */
        function connect_to_admindb($dbsrv, $dbuser, $passwd, $tkf_adm) {
            $admindb = new mysqli($dbsrv, $dbuser, $passwd, $tkf_adm);
            if ($admindb->connect_errno) {
                echo $dbsrv;
                exit;
            } else {
                return $admindb;
            }
            
        }
        connect_to_admindb($dbsrv, $dbuser, $passwd, $tkf_adm);

        /* Funktion zum Verbinden zur Wetter Datenbank */
        function connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database) {
            $db = new mysqli($dbsrv, $dbuser, $passwd, $database);
            if ($db->connect_errno) {
                echo "Fehler " . $db->connect_errno . ": " . $db->connect_errno;
                exit;
            } else {
                return $db;
            }
            
        }
        connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
?>