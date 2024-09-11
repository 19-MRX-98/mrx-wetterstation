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
                    $get_avg_q1 = "SELECT COUNT(*) from tageshöchstwerte24 PARTITION (p_tageshöchstwerte24_01,p_tageshöchstwerte24_02,p_tageshöchstwerte24_03) WHERE Höchstwert >=35";
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