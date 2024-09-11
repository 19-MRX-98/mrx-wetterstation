<?php
    require_once("src/conf/config.inc.php");
    function airpressure_trend($dbsrv,$dbuser,$passwd,$database){
        $today = date("Y-m-d");
        $limiter = 8;
        $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);
        // Überprüfen der Verbindung
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM airpressure ORDER BY datetime DESC LIMIT $limiter";
        $result = $conn->query($sql);
    
        // Überprüfen, ob Daten vorhanden sind
        if ($result->num_rows > 0) {
            // Arrays für Zeitstempel und Werte initialisieren
            $timestamps = array();
            $values = array();
    
            // Daten in Arrays einlesen
            while ($row = $result->fetch_assoc()) {
                $timestamps[] = $row['datetime'];
                $values[] = $row['airpressure'];
            }
    
            // Exponentiellen gleitenden Durchschnitt (EMA) berechnen
            $alpha = 0.2; // Anpassen
            $ema = array();
            $ema[0] = $values[0]; // Der erste Wert ist gleich dem ersten Datenpunkt
            $airpressure_data = array();
            $airpressure_data[0] = $values[0];
            for ($i = 1; $i < count($values); $i++) {
                $ema[$i] = $alpha * $values[$i] + (1 - $alpha) * $ema[$i - 1];
            }
            // Beispiel-Ausgabe nur zum testen
            /*for ($i = 0; $i < count($timestamps); $i++) {
                echo "Timestamp: " . $timestamps[$i] . " - Originalwert: " . $values[$i] . " - 'Exponentieller Gleitender Durchschnitt: " . $ema[$i] . "<br>";
            }*/
            //Entscheiden ob Luftdruck fallend, steigend oder gleichbleibend
            $latest_ema = reset($ema)."<br>";
            $first_ema = end($ema);
    
            if ($latest_ema > $first_ema) {
                    echo "<img src = 'src/pictures/icons8/icons8-arrow-up-96 (1).png'></img> Steigend um +";
                } elseif ($latest_ema < $first_ema) {
                    echo "<img src = 'src/pictures/icons8/icons8-arrow-down-58.png'></img> Fallend um -";
                } else {
                    echo "Trend: Stabil =";
                }
            } 
            else {
                echo "Keine Daten vorhanden.";
            }
            // Berechnung der Stunden zurück
            $stunden = $limiter * 0.5;

            //Differenz zwischen erstem und letztem Wert berechnen
            for ($a = 0; $a < count($values); $a++){
                $airpressure_data[$a] = $values[$a];

            }
            $x = reset($airpressure_data);
            $y = end($airpressure_data);
            $diff = $y - $x;
            //echo $s1 = number_format($diff, 0, ".",",")." hPA in den letzten $stunden Stunden";

        // Verbindung schließen
        $conn->close();
    }
airpressure_trend($dbsrv,$dbuser,$passwd,$database);
?>