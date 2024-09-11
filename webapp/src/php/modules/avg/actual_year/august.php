    <?php
        $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
            if($db->connect_errno)
                {
                 echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
                 echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
                }
            else
                {
                 $get_minmaxavg = "SELECT date(datetime),Max(Temperatur),AVG(Temperatur),Min(Temperatur),Regen from wetterdaten01  PARTITION (p_wetterdaten_act_08) group by date(datetime)";
                 $min_max_avg = $db->query($get_minmaxavg);
                    while($data = $min_max_avg->fetch_array())
                        {
                            echo "
                            <div class='table-responsive'>
                            <table class = 'table table-hover'>
                                <thead class='table-primary'>
                                    <th scope='col'>Datum</th>
                                    <th scope='col'>MaxTemp</th>
                                    <th scope='col'>AVG</th>
                                    <th scope='col'>MinTemp</th>
                                    <th scope='col'>Regen</th>
                                </thead>
                                <tbody class='table-group-divider'>
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
                                </div>
                            ";	 
                        }
                }
?>