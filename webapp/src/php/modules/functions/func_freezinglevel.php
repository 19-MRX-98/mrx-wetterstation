<?php
    require_once("/var/www/html/src/conf/config.inc.php");
    $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);
    $konstante_a = 17.27;
    $konstante_b = 237.7;
    // Funktion zur Berechnung des Taupunkts
    function taupunkt($lufttemperatur, $luftfeuchtigkeit) {
        $konstante_a = 17.27;
        $konstante_b = 237.7;
        $gamma = log($luftfeuchtigkeit / 100) + ($konstante_a * $lufttemperatur) / ($konstante_b + $lufttemperatur);
        $taupunkt = ($konstante_b * $gamma) / ($konstante_a - $gamma);
        return round($taupunkt, 2);
    }

    // Temperatur am Boden aus der Datenbank abrufen
    $sql = "SELECT Temperatur, Feuchte FROM $database.wetterdaten01 ORDER BY datetime DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $temperatur = $row["Temperatur"];
        $feuchte = $row["Feuchte"];
        $lufttemperatur = $temperatur / umrechnung_temp; // Grad Celsius
        $luftfeuchtigkeit = $feuchte; // Prozent
        $taupunkt = taupunkt($lufttemperatur, $luftfeuchtigkeit);
    } else {
        echo "0 results";
        exit(); // Beenden Sie das Skript, wenn keine Ergebnisse gefunden wurden.
    }

    // Luftdruck aus der Datenbank abrufen
    $sql = "SELECT airpressure FROM $database.airpressure ORDER BY datetime DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $luftdruck = $row["airpressure"];
    } else {
        echo "0 results";
        exit(); // Beenden Sie das Skript, wenn keine Ergebnisse gefunden wurden.
    }

    // Höhe der Wetterstation aus der Tabelle jahresmittel_1991_2020 beziehen
    $sql = "SELECT hoeheNN FROM $database.jahresmittel_1991_2020 WHERE selected = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $wetterstation_hoehe = $row["hoeheNN"];
    } else {
        echo "0 results";
        exit(); // Beenden Sie das Skript, wenn keine Ergebnisse gefunden wurden.
    }

    // Nullgradgrenze berechnen
    $lufttemperatur_0_grad = 0; // Temperatur bei 0°C
    $luftdruck_0_grad = $luftdruck * exp((-9.81 * 0.0289644 * ($wetterstation_hoehe / (8.31432 * ($lufttemperatur + 273.15)))) / (9.80665 * ($lufttemperatur + 273.15)));
    $rounded_luftdruck_0grad=round($luftdruck_0_grad,0);
    $nullgradgrenze_hoehe = (($konstante_b * log(($luftdruck / $rounded_luftdruck_0grad)) - ($konstante_b * log(($luftdruck / $rounded_luftdruck_0grad))))) / (($konstante_a / $lufttemperatur) - ($konstante_a / $lufttemperatur_0_grad));

    echo "Nullgradgrenze: " . round($nullgradgrenze_hoehe, 2) . " Meter";

    $conn->close();
?>