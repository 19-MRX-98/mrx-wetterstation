<?php
require_once("/var/www/html/src/conf/config.inc.php");
            $actual_year = date("Y");
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
                        <table class = 'table table-hover'>
                            <thead class='table-primary'>
                                <th scope='col'>Parameter</th>
                                <th scope='col'>Wert(Abfrage Jahr)</th>
                                <th scope='col'>Datum(Abfrage Jahr)</th>
                            </thead>
                            <tbody class='table-group-divider'>
                        ";
                            $get_topwerte = "SELECT Temperatur, DATE_FORMAT(datetime,'%d.%m.%Y') FROM wetterdaten01 WHERE Temperatur=(SELECT MAX(Temperatur) FROM wetterdaten01) LIMIT 1;";
                            $actual_tops = $db->query($get_topwerte);
                            while($data = $actual_tops->fetch_array())
                                {
                                    $z=$data[1];
                                    echo "
                                         <tr>
                                            <td>
                                             Höchste Temperatur
                                            </td>
                                            <td>
                                                ".$data[0]/umrechnung_temp."°C
                                            </td>
                                            <td>
                                                $data[1]
                                            </td>
                                        </tr>
                                    ";	
                                            
                                }
                            //zweite Abfrage -> Tiefste Temperatur
                            $get_topwerte04="SELECT Temperatur, DATE_FORMAT(datetime,'%d.%m.%Y') FROM wetterdaten01 WHERE Temperatur=(SELECT MIN(Temperatur) FROM wetterdaten01) LIMIT 1;";
                            $actual_tops4 = $db->query($get_topwerte04);
                            while($data4 = $actual_tops4->fetch_array())
                                {
                                    echo "
                                        <tr>
                                            <td>
                                                Tiefste Temperatur
                                            </td>
                                            <td>
                                            ".$data4[0]/umrechnung_temp." °C
                                            </td>
                                            <td>
                                             $data4[1]
                                            </td>
                                         </tr>
                                    ";
                                }
                            //dritte Abfrage -> Stärkste Böe
                            $get_topwerte02="SELECT Windboen, DATE_FORMAT(datetime,'%d.%m.%Y') FROM wetterdaten01 WHERE Windboen=(SELECT MAX(Windboen) FROM wetterdaten01) LIMIT 1;";
                            $actual_tops2 = $db->query($get_topwerte02);
                            while($data2 = $actual_tops2->fetch_array())
                                {
                                    echo "
                                        <tr>
                                            <td>
                                                Stärkste Böe
                                            </td>
                                            <td>
                                                ".$data2[0]." km/h
                                            </td>
                                            <td>
                                                $data2[1]
                                            </td>
                                        </tr>
                                    ";
                                }
                            //Vierte Abfrage
                            $get_topwerte4="SELECT (SELECT MAX(Regen) FROM wetterdaten01)-(SELECT min(Regen) FROM wetterdaten01) AS Gesamt;";
                            $actual_tops4 = $db->query($get_topwerte4);
                            while($data_4 = $actual_tops4->fetch_array())
                                {
                                    echo "
                                    <tr>
                                        <td>
                                            Jahresniederschlag
                                        </td>
                                        <td>
                                            ".$data_4[0]/umrechnung_niederschlag." L/m²
                                        </td>
                                        <td>
                                            ".$today = date("j.m.Y")." *
                                        </td>
                                    </tr>
                                    ";
                                }
                            $get_avg_jahresmittel="Select AVG(Temperatur) AS Jahresmitteltemperatur from wetterdaten01";
                            $avg_year = $db->query($get_avg_jahresmittel);
                            while($data_AVGYEAR = $avg_year->fetch_array()){
                                echo "
                                <tr>
                                    <td>
                                        Jahresmitteltemperatur
                                    </td>
                                    <td>
                                        ".round($data_AVGYEAR[0]/umrechnung_temp,2)."°C
                                    </td>
                                    <td>
                                    ".$today = date("j.m.Y")." *
                                    </td>
                                </tr>
                                ";
                            }
                            $get_warme_tage="SELECT COUNT(*) from tageshöchstwerte WHERE Höchstwert BETWEEN 25 AND 29.9";
                            $warmetage = $db->query($get_warme_tage);
                            while($data5 = $warmetage->fetch_array()){
                                echo "
                                <tr>
                                    <td>
                                        Anzahl der warmen Tage (Tmax >25°C u <30°C)
                                    </td>
                                    <td>
                                        ".$data5[0]." Tage
                                    </td>
                                    <td>
                                        ".$today = date("j.m.Y")." *
                                    </td>
                                </tr>
                                ";
                            }
                            $get_heiße_tage="SELECT COUNT(*) from tageshöchstwerte WHERE Höchstwert BETWEEN 30 AND 34.9";
                            $heißetage = $db->query($get_heiße_tage);
                            while($data6 = $heißetage->fetch_array()){
                                echo "
                                <tr>
                                    <td>
                                        Anzahl der heißen Tage (Tmax >30°C u <35°C)
                                    </td>
                                    <td>
                                        ".$data6[0]." Tage
                                    </td>
                                    <td>
                                        ".$today = date("j.m.Y")." *
                                    </td>
                                </tr>
                                ";
                            }
                            $get_wuesten_tage="SELECT COUNT(*) from tageshöchstwerte WHERE Höchstwert >= 35;";
                            $wuestentage = $db->query($get_wuesten_tage);
                            while($data7 = $wuestentage->fetch_array()){
                                echo "
                                <tr>
                                    <td>
                                        Anzahl der Wüstentage (Tmax >35°C)
                                    </td>
                                    <td>
                                        ".$data7[0]." Tage
                                    </td>
                                    <td>
                                        ".$today = date("j.m.Y")." *
                                    </td>
                                </tr>
                                ";
                            }
                            $get_avg_feuchte="Select AVG(Feuchte) AS Mittlerefeuchte from wetterdaten01;";
                            $avg_feuchte = $db->query($get_avg_feuchte);
                            while($data_AVG_FEUCHTE = $avg_feuchte->fetch_array()){
                            echo "
                                <tr>
                                <td>
                                    Mittlere Feuchte
                                </td>
                                <td>
                                    ".round($data_AVG_FEUCHTE[0],2)." %
                                </td>
                                <td>
                                    ".$today = date("j.m.Y")." *
                                </td>
                            </tr>
                            ";
                            }
                            $get_max_pressure="Select date(datetime), MAX(airpressure) AS MaxPressure from airpressure;";
                            $max_pressure = $db->query($get_max_pressure);
                            while($data_max_pressure = $max_pressure->fetch_array()){
                            echo "
                                <tr>
                                <td>
                                    Höchster Luftdruck
                                </td>
                                <td>
                                    ".round($data_max_pressure[1]/umrechnung_luftdruck,0)." hPA
                                </td>
                                <td>
                                    ".$data_max_pressure[0]."
                                </td>
                            </tr>
                            ";
                            }
                            $get_min_pressure="Select date(datetime), MIN(airpressure) AS MINPressure from airpressure;";
                            $min_pressure = $db->query($get_min_pressure);
                            while($data_min_pressure = $min_pressure->fetch_array()){
                            echo "
                                <tr>
                                <td>
                                    Tiefster Luftdruck
                                </td>
                                <td>
                                    ".round($data_min_pressure[1]/umrechnung_luftdruck,0)." hPA
                                </td>
                                <td>
                                    ".$data_min_pressure[0]."
                                </td>
                            </tr>
                            ";
                            }
                            $get_avg_pressure="Select date(datetime), AVG(airpressure) AS AVGPressure from airpressure;";
                            $avg_pressure = $db->query($get_avg_pressure);
                            while($data_avg_pressure = $avg_pressure->fetch_array()){
                            echo "
                                <tr>
                                <td>
                                    Mittlerer Luftdruck
                                </td>
                                <td>
                                    ".round($data_avg_pressure[1]/umrechnung_luftdruck,0)." hPA
                                </td>
                                <td>
                                    ".$today = date("j.m.Y")." *
                                </td>
                            </tr>
                            </table>
                            </div>
                            ";
                            }
                    }
mysqli_close($db);
?>