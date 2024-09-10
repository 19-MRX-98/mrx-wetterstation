<?php
    $conn = new mysqli($dbsrv,$dbuser,$passwd,$database); //Create Database Conenction

    
    $select_temp_and_humidity = "SELECT Temperatur, Feuchte FROM $database.wetterdaten01 ORDER BY datetime DESC LIMIT 1";
    $result = $conn->query($select_temp_and_humidity);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $temperatur = $row["Temperatur"];
        $feuchte = $row["Feuchte"];
        $lufttemperatur = $temperatur/umrechnung_temp; // Grad Celsius
        $luftfeuchtigkeit = $feuchte; // Prozent
        $taupunkt = taupunkt($lufttemperatur, $luftfeuchtigkeit);
        $gerechnete_temperatur= $temperatur/10;
        
    }
    } else {
    echo "0 results";
    }
    $conn->close();
?>