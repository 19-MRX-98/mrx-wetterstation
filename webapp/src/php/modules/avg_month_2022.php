<?php
    $db_conn = connect_to_db($dbsrv, $dbuser, $passwd, $database);
    if($db_conn->connect_errno)
        {
            echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
            echo "Fehler".$db_conn->connect_errno.":".$db_conn->connect_errno; exit;
        }
        else
        {
            $get_avg="SELECT MONTHNAME(datetime),AVG(temperatur)/10 FROM wetterdaten2022 GROUP BY MONTH(datetime);";
            $avg = $db_conn->query($get_avg);
            while($data_avg = $avg->fetch_array()){
                $avg1=round($data_avg[1],2);
                echo "
                <div class='table-responsive'>
                    <table class='table'>
                        <thead class='table-primary'>
                            <th scope='col'>Monat</th>
                            <th scope='col'>Mitteltemperatur °C</th>
                        </thead>
                        <tr>
                            <td>
                                $data_avg[0]
                            </td>
                            <td>
                                $avg1
                            </td>
                        </tr>
                    </table>
                </div>
            ";
            }
        }
    mysqli_close($db_conn);
?>