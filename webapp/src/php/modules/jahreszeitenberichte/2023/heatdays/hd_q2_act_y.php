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
               $get_avg_q1 = "SELECT COUNT(*) from tageshöchstwerte23 PARTITION (p_tageshöchstwerte23_04,p_tageshöchstwerte23_05,p_tageshöchstwerte23_06) WHERE Höchstwert BETWEEN 30 AND 34.9";
               $avg_q1 = $db->query($get_avg_q1);
               while($data = $avg_q1->fetch_array())
                   {
                       if($data[0] == 0){
                           echo "-";
                       }
                       else{
                           echo round($data[0],2);
                       }
                   }
       }
       mysqli_close($db);
       #/umrechnung_wind_spitzen1*umrechnung_wind_spitzen2
?>