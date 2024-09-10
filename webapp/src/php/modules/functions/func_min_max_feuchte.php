<?php
    require_once("src/conf/config.inc.php");

    function fetch_data_min_max_feuchte($dbsrv,$dbuser,$passwd,$database){
        $date = date("d.m.Y");
        $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
        else{
            $sql_min_feuchte = "SELECT MIN(Feuchte) as min_feuchte FROM wetterdaten01 WHERE date(datetime) = CURDATE()";

            // SQL-Abfrage für die Höchstfeuchteeratur
            $sql_max_feuchte= "SELECT MAX(Feuchte) as max_feuchte FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
            
            // Tiefstfeuchteeratur abrufen
            $result_min_feuchte = $conn->query($sql_min_feuchte);
            $row_min_feuchte = $result_min_feuchte->fetch_assoc();
            $min_feuchte = $row_min_feuchte['min_feuchte'];
            
            // Höchstfeuchteeratur abrufen
            $result_max_feuchte = $conn->query($sql_max_feuchte);
            $row_max_feuchte = $result_max_feuchte->fetch_assoc();
            $max_feuchte = $row_max_feuchte['max_feuchte'];
            
            // Ausgabe der Ergebnisse
            echo "<table class='table'>
                <thead>
                    <tr>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>Max</th>
                                <td class='table-warning'>$max_feuchte %</td>
                            </tr>
                        <tr>
                            <th scope='row'>Min</th>
                                <td class='table-info'>$min_feuchte %</td>
                            </tr>
                        <tr>
                    </tbody>
                </table>";
        }
        mysqli_close($conn);
    }
    fetch_data_min_max_feuchte($dbsrv,$dbuser,$passwd,$database);
?>