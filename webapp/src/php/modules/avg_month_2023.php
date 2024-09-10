<?php
require_once("/var/www/html/src/conf/config.inc.php");
    $db_conn = new mysqli($dbsrv,$dbuser,$passwd,$database);
    if($db_conn->connect_errno)
        {
            echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
            echo "Fehler".$db_conn->connect_errno.":".$db_conn->connect_errno; exit;
        }
        else
        {
            echo "
            <div class='table-responsive'>
                <table class = 'table table-hover'>
                    <thead class='table-primary'>
                        <th scope='col'>Monat</th>
                        <th scope='col'>Mitteltemperatur °C</th>
                    </thead>
            ";
            $get_avg="SELECT MONTHNAME(datetime),AVG(temperatur)/10 FROM wetterdaten2023 GROUP BY MONTH(datetime);";
            $avg = $db_conn->query($get_avg);
            while($data_avg = $avg->fetch_array()){
            echo "
                    <tr>
                        <td>
                            $data_avg[0]
                        </td>
                        <td>
                        ". round($data_avg[1],2); " °C
                        </td>
                    </tr>
                </table>
            </div>
            ";
            }
        }
    mysqli_close($db_conn);
?>