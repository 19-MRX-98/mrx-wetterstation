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
                    $get_avg_q1 = "SELECT AVG(TEMPERATUR)/10 FROM wetterdaten2024 PARTITION (p_wetterdaten_24_10,p_wetterdaten_24_11);";
                    $avg_q1 = $db->query($get_avg_q1);
                    while($data = $avg_q1->fetch_array())
                        {
                              
                            if($data[0] == 0){
                                echo "-";
                            }
                            else{
                                echo round($data[0],2)." °C";
                            }
                        }
            }
            mysqli_close($db);
?>