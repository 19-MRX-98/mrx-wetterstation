<?php
    require_once("global_functions.php");
  

    function check_systems($dbsrv,$dbport,$connection_timeout){
        $fp = fsockopen($dbsrv,$dbport, $errno, $errstr,$connection_timeout);
          
            if (!$fp) {
              return false;
            } else {
              fclose($fp);
              return true;
            }
          }
          if (check_systems($dbsrv, $dbport,$connection_timeout)) {
            logs("Datenbankserver über Port $dbport erreichbar","INFO");
          } else {
            logs("Datenbankserver über Port $dbport nicht erreichbar","ERROR");
          }
    check_systems($dbsrv,$dbport,$connection_timeout);
?>