<?php
    $db = connect_to_db($dbsrv, $dbuser, $passwd, $database);

        function fetch_data_wind($db){
            $date = date("d.m.Y");
            $conn = $db;

            // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
            if ($conn->connect_error) {
                die("Verbindung fehlgeschlagen: " . $conn->connect_error);
            }
            else{
                $sql_wind = "SELECT MAX(Windboen) as wind FROM wetterdaten01 WHERE date(datetime) = CURDATE()";

                // Maximale Windgeschwindigkeit abrufen
                $result_wind = $conn->query($sql_wind);
                $row_wind = $result_wind->fetch_assoc();
                $wind = $row_wind['wind'];
                // Ausgabe der Ergebnisse
                echo $wind . "km/h";
            }
            mysqli_close($conn);
        }
        fetch_data_wind($db);
?>