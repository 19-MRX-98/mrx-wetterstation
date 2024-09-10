<?php

    require_once("src/php/globals/global_functions.php");
    $db = connect_to_db($dbsrv, $dbuser, $passwd, $database);

    // Abfrage ausführen
    $get_weatherdata = $db->query("SELECT * FROM wetterdaten01 ORDER BY datetime DESC LIMIT 1");
    while($data =  $get_weatherdata->fetch_array())
    {

        $gerechnete_temperatur=$data[1]/umrechnung_temp;
        $gerechnete_windgeschwindigkeit=$data[3]/umrechnung_wind1*umrechnung_wind2;
        $gerechnete_windboen=$data[4];
        $niederschlag=$data[5]/umrechnung_niederschlag-niederschlagsdifferenz;

        echo $gerechnete_temperatur;
    echo"";
    }
    
    
    // Verbindung schließen
    mysqli_close($db);
    echo "<br>";
    echo $sunup = astrodate_sun_up($dbsrv, $dbuser,$passwd,$database);
    echo "<br>";
    echo $sundown = astrodate_sun_down($dbsrv, $dbuser,$passwd,$database);

   
?>
