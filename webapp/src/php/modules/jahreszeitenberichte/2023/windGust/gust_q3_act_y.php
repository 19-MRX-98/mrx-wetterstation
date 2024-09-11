<?php
    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
    if($db->connect_errno)
            {
                echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
                echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
            }
            else
            {
            //$db->set_charset("utf-8");
            $get_avg_q1 = "SELECT MAX(Windboen) FROM wetterdaten01 PARTITION (p_wetterdaten_act_07,p_wetterdaten_act_08,p_wetterdaten_act_09);";
            $avg_q1 = $db->query($get_avg_q1);
            while($data = $avg_q1->fetch_array())
                {
                    if($data[0] == 0){
                        echo "-";
                    }
                    else{
                        echo round($data[0],2)." km/h";
                    }
                }
            }
            mysqli_close($db);
            #/umrechnung_wind_spitzen1*umrechnung_wind_spitzen2
?>