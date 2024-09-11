<?php
    
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
                            <th scope='col'>Monat</th>
                            <th scope='col'>Niederschlag</th>
                            <th scope='col'>Maßeinheit</th>
                            <th scope='col'>Wasserampel</th>
                        </thead>
                    <tbody class='table-group-divider'>
                ";
                //$db->set_charset("utf-8");
                    $get_rain = "SELECT monthnr, max_regen, min_regen from regensummen_22";
                    $rain_= $db->query($get_rain);
                    while($data = $rain_->fetch_array())
                        {
                          $x = $data[1]/umrechnung_niederschlag;
                          $y = $data[2]/umrechnung_niederschlag;
                          $ausg = $x -$y;
                            echo "
                                <tr>
                                    <td>
                                        $data[0]
                                    </td>
                                    <td>
                                        $ausg
                                    </td>
                                    <td>
                                        L/qm²
                                    </td>
                                    <td>";
                                    include("vgl_rain.php");
                            echo "  
                            </td>
                                <tr>
                            ";      
                        }
                        echo "</table>";
mysqli_close($db);
}
?>