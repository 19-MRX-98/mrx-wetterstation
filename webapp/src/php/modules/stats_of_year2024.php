<?php
            $actual_year = date("Y");
            $db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
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
                            $get_topwerte = "SELECT * FROM  stats_2024";
                            $actual_tops = $db->query($get_topwerte);
                            while($data = $actual_tops->fetch_array())
                                {
                                    $z=$data[1];
                                    echo "
                                         <tr>
                                            <td>
                                                $data[0]
                                            </td>
                                            <td>
                                                $data[1]
                                            </td>
                                            <td>
                                                $data[2]
                                            </td>
                                        </tr>
                                    ";	
                                            
                                }
                            }
                        echo "
                            </table>
                        ";
mysqli_close($db);
?>