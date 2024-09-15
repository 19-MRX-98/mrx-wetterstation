<?php

function windchill($ini,$dbsrv,$dbuser,$passwd,$database)
{   
    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
    if($db->connect_errno)
    {
        echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
        echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
    }
    else
    {
        $get_weatherdata = "SELECT * FROM wetterdaten01 ORDER BY datetime DESC LIMIT 1";
        $actual_weather = $db->query($get_weatherdata);
        while($data = $actual_weather->fetch_array())
            {
                $gerechnete_temperatur=$data[1]/ $ini['umrechnung_temp'];
                $gerechnete_windgeschwindigkeit=$data[3]/$ini['umrechnung_wind1']*$ini['umrechnung_wind2'];
                $temperatur=$gerechnete_temperatur;
                $windgesch=$gerechnete_windgeschwindigkeit;
            }
    }
    define("T",$temperatur);
    define("V",$windgesch);
        if(T <= 10 AND V > 0 ){
            //w = 13,12 + 0,6215*t - 11,37*v0,16 + 0,3965*t*v0,16
                        //OK
            $WCT=13.12+0.6215*T-11.37*pow(V,0.16)+0.3965*T*pow(V,0.16);
            echo "Der Windchill beträgt zurzeit:".round($WCT,1)."°C";
    }
        else{
            echo "Kein Windchill";
    }
    mysqli_close($db);
}
windchill($ini,$dbsrv,$dbuser,$passwd,$database);
?>