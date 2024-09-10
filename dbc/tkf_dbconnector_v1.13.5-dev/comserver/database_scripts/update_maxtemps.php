<?php
require_once("/tkf_com/global_functions/global_functions.php");
$scriptname=$_SERVER['SCRIPT_NAME'];
$db = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
    $set_nul = "TRUNCATE TABLE $ini[max_temp_tbl]";
    logs("$scriptname => Tabelle $ini[max_temp_tbl] geleert","INFO");
    mysqli_multi_query($db, $set_nul);
    $i=1;

    $db->close();

if($i = 1){
    $db = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);  
    $set_new_values = "INSERT INTO $ini[max_temp_tbl] (Datum, Höchstwert) SELECT datetime,MAX(Temperatur)/10 FROM wetterdaten01 GROUP BY date(DATETIME)";
    $update= $db->query($set_new_values);
    logs("$scriptname => Tabelle $ini[max_temp_tbl] Aktualisiert",'INFO');
    $db->close();
}

?>