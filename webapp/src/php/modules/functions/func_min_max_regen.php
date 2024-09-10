<?php
    require_once("src/conf/config.inc.php");

    function fetch_data_min_max_regen($dbsrv,$dbuser,$passwd,$database){
        $date = date("d.m.Y");
        $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
        else{
            $sql_min_regen = "SELECT MIN(Regen)/10 as min_regen FROM wetterdaten01 WHERE date(datetime) = CURDATE()";

            // SQL-Abfrage für die Höchstregeneratur
            $sql_max_regen= "SELECT MAX(Regen)/10 as max_regen FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
            
            // Tiefstregeneratur abrufen
            $result_min_regen = $conn->query($sql_min_regen);
            $row_min_regen = $result_min_regen->fetch_assoc();
            $min_regen = $row_min_regen['min_regen'];
            
            // Höchstregeneratur abrufen
            $result_max_regen = $conn->query($sql_max_regen);
            $row_max_regen = $result_max_regen->fetch_assoc();
            $max_regen = $row_max_regen['max_regen'];
            if($max_regen == $min_regen){
                echo "<table class='table'>
                <thead>
                    <tr>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>Niederschlag(Max) heute: </th>
                                <td class='table-warning'>- L/qm²</td>
                            </tr>
                        <tr>
                            <th scope='row'>Niederschlag(Min) heute:</th>
                                <td class='table-info'>- L/qm²</td>
                            </tr>
                        <tr>
                    </tbody>
                </table>";
            }
            else{
                $niederschlag_heute = $max_regen - $min_regen;
                echo "<table class='table'>
                <thead>
                    <tr>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>Niederschlag(Max) heute: </th>
                                <td class='table-warning'>".round($niederschlag_heute,2)." L/qm²</td>
                            </tr>
                        <tr>
                            <th scope='row'>Niederschlag(Min) heute:</th>
                                <td class='table-info'>- L/qm²</td>
                            </tr>
                        <tr>
                    </tbody>
                </table>";
            }
        }
        mysqli_close($conn);
    }
    fetch_data_min_max_regen($dbsrv,$dbuser,$passwd,$database);
?>