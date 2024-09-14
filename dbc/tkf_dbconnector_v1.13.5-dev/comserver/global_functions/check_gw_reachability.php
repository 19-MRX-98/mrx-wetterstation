<?php
    require_once("global_functions.php");
    //require_once("/tkf_com/conf/config.inc.php");
    $gw_address= $ini['gw_address'];
    $gw_http_port= $ini['gw_port'];
    $gw_conn_timeout = $ini['gw_healthcheck_timeout'];

    function check_gw($gw_address,$gw_http_port,$gw_conn_timeout){
        $fp = fsockopen($gw_address,$gw_http_port, $errstr, $errno, $gw_conn_timeout);
        if (!$fp) {
          logs("func_check_gw => TKF Gateway ist nicht erreichbar{|| Fehler: $errstr || Fehlernachricht: $errno ||}","ERROR");
      } else {
          $out = "GET / HTTP/1.1\r\n";
          $out .= "Host: $gw_address\r\n";
          $out .= "Connection: Close\r\n\r\n";
          fwrite($fp, $out);
          while (!feof($fp)) {
              //echo fgets($fp, 128);
          }
          fclose($fp);
          logs("func_check_gw => TKF Gateway ist erreichbar{|| HTTP 200 OK ||}","Info");
      }
    }
    check_gw($gw_address,$gw_http_port,$gw_conn_timeout);
?>