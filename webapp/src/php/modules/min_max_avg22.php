<?php
 if(ISSET($_POST['filter'])){
    $amount_datasets=$_POST['amount_datasets'];
    $sort=$_POST['sort'];
echo "
    <div class = 'tooltip_filtermode'>
        Filtermodus: $amount_datasets  Datensätze || $sort sortiert
    </div>
";
$db = new mysqli($dbsrv,$dbuser,$passwd,$database);
if($db->connect_errno)
        {
            echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
            echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
        }
        else
        {
                $get_minmaxavg = "SELECT date(datetime),Max(Temperatur),AVG(Temperatur),Min(Temperatur),Regen from wetterdaten2022 group by date(datetime)$sort LIMIT $amount_datasets";
                $min_max_avg = $db->query($get_minmaxavg);
                while($data = $min_max_avg->fetch_array())
                    {
                        echo "
                        <table>
                             <tr>
                                <td>
                                  $data[0]
                                </td>
                                <td>
                                    ".round($data[1]/umrechnung_temp,2)." °C
                                </td>
                                <td>
                                    ".round($data[2]/umrechnung_temp,2)." °C
                                </td>
                                <td>
                                ".round($data[3]/umrechnung_temp,2)." °C
                                </td>
                                <td>
                                ".round($data[4]/umrechnung_niederschlag,2)." L/qm²
                                </td>
                            </tr>
                        </table>
                        ";	
                                
        }
    }
 }
 mysqli_close($db);
?>