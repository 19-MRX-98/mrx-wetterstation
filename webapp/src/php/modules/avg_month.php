<?php
require_once("/var/www/html/src/conf/config.inc.php");
    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
    if($db->connect_errno)
        {
            echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
            echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
        }
        else
        {
            echo "
            <div class='table-responsive'>
                <table class='table'>
                    <thead class='table-primary'>
                        <th scope='col'>Monat</th>
                        <th scope='col'>Mitteltemperatur in °C</th>
                        <th scope='col'>Abweichung LjM in °C</th>
                    </thead>
            ";
            $get_avg_per_month="SELECT MONTHNAME(datetime),AVG(temperatur)/10 FROM wetterdaten01 GROUP BY MONTH(datetime);";
            $avg_perMONTH = $db->query($get_avg_per_month);
            while($data_avg_perMONTH = $avg_perMONTH->fetch_array()){
                $avg = round($data_avg_perMONTH[1],2);
                echo "
                    
                            <tr>
                                <td>
                                    $data_avg_perMONTH[0]
                                </td>
                                <td>
                                    $avg
                                </td>
                                <td>
                                    dd
                                </td>
                            </tr>
                        </table>
                    </div>
                ";
            }
        }
    mysqli_close($db);
?>
