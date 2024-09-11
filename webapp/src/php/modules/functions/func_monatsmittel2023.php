<?php

require_once("src/conf/config.inc.php");
    function avg_month($dbsrv,$dbuser,$passwd,$database){
        $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
        if($db->connect_errno)
            {
                echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
                echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
            }
            else
            { 
                $stmt = $db->prepare("SELECT MONTHNAME(datetime) AS monat, AVG(temperatur)/10 AS monatsmitteltemperatur FROM wetterdaten2023 GROUP BY MONTH(datetime);");
                $stmt->execute();
                $result = $stmt->get_result();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $monat = $row["monat"];
                        $r = $row["monatsmitteltemperatur"];

                        // Fetch langjähriges Mittel für den aktuellen Monat
                        $abfrage2 = $db->prepare("SELECT $monat FROM jahresmittel_1991_2020 WHERE selected = '1'");
                        $abfrage2->execute();
                        $result2 = $abfrage2->get_result();

                        if (mysqli_num_rows($result2) > 0) {
                            while ($row1 = mysqli_fetch_array($result2)) {
                                $r1 = $row1[$monat];
                            }

                            // Berechne die Abweichung und gib das Ergebnis aus
                            $differenz = $r - $r1;
                            //echo "Abweichung für $monat: " . ($differenz / 10) . "°C<br>";
                            echo "
                            <div class ='table-responsive'>
                            <table class='table'>
                                <thead class='table-primary'>
                                    <th witdh>Monat</th>
                                    <th witdh><center>Mitteltemperatur in °C</center></th>
                                    <th witdh><center>Mitteltemperatur LjM °C</center></th>
                                    <th witdh><center>Abweichung LjM in °C</center></th>
                                </thead>
                                    <tr>
                                        <td>
                                            $monat
                                        </td>
                                        <td>
                                        <center><button type='button' class='btn btn-success'>".round($r,3)."</button></center>
                                        </td>
                                        <td>
                                        <center><button type='button' class='btn btn-secondary'>$r1</button></center>
                                        </td>
                                        <td>";
                                            if($differenz >= '0' && $differenz <= '0.5'){
                                                echo "<center><button type='button' class='btn btn-primary'>". round($differenz,2)."</button><center>";
                                            }
                                            elseif($differenz > '0.5' && $differenz <= '1.0'){
                                                echo "<center><button type='button' class='btn btn-info'>". round($differenz,2)."</button></center>";
                                            }
                                            elseif($differenz > '1.0' && $differenz <= '2.0'){
                                                echo "<center><button type='button' class='btn btn-warning'>". round($differenz,2)."</button></center>";
                                            }
                                            elseif($differenz > '2.0'){
                                                echo "<center><button type='button' class='btn btn-danger'>". round($differenz,2)."</button></center>";
                                            }
                                        echo"
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        ";
                            // Optional: Überprüfen, ob die Abweichung größer als ein bestimmter Schwellenwert ist
                            $schwellenwert = 5; // Beispielwert
                            if ($differenz > $schwellenwert) {
                                echo "Achtung: Die Abweichung ist größer als $schwellenwert °C!<br>";
                            }
                        } else {
                            echo "Langjähriges Mittel nicht gefunden für $monat.<br>";
                        }
                    }
                } else {
                    echo "Keine Daten gefunden.";
                }
            }
    mysqli_close($db);
    }
avg_month($dbsrv,$dbuser,$passwd,$database);
    
?>