<?php
    require_once("src/conf/config.inc.php");

    function fetch_data_min_max($dbsrv,$dbuser,$passwd,$database){
        $date = date("d.m.Y");
        $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
        else{
            $sql_min_temp = "SELECT MIN(temperatur)/10 as min_temp FROM wetterdaten01 WHERE date(datetime) = CURDATE()";

            // SQL-Abfrage für die Höchsttemperatur
            $sql_max_temp = "SELECT MAX(temperatur)/10 as max_temp FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
            
            // Tiefsttemperatur abrufen
            $result_min_temp = $conn->query($sql_min_temp);
            $row_min_temp = $result_min_temp->fetch_assoc();
            $min_temp = $row_min_temp['min_temp'];
            
            // Höchsttemperatur abrufen
            $result_max_temp = $conn->query($sql_max_temp);
            $row_max_temp = $result_max_temp->fetch_assoc();
            $max_temp = $row_max_temp['max_temp'];
            
            // Ausgabe der Ergebnisse
            echo "<table class='table'>
                <thead>
                    <tr>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>Max</th>
                                <td class='table-warning'>".round($max_temp,2)."°C</td>
                            </tr>
                        <tr>
                            <th scope='row'>Min</th>
                                <td class='table-info'>".round($min_temp,2)."°C</td>
                            </tr>
                        <tr>
                    </tbody>
                </table>";
        }
        mysqli_close($conn);
    }
    fetch_data_min_max($dbsrv,$dbuser,$passwd,$database);
?>