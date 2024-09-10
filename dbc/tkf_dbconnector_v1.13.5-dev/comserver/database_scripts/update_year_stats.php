<?php
    require_once("/tkf_com/global_functions/global_functions.php");

    $actual_year = date("Y");
    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);


    // Funktion, um Daten in die Datenbank einzufügen
    function insertIntoDatabase($db, $parameter, $wert, $datum,$ini) {
        $stmt = $db->prepare("INSERT INTO $ini[stats_act_year_tbl] (parameter, wert, datum) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $parameter, $wert, $datum);
        $stmt->execute();
        $stmt->close();
    }

    // Höchste Temperatur
    $get_topwerte = "SELECT Temperatur, DATE_FORMAT(datetime,'%Y-%m-%d') FROM wetterdaten01 WHERE Temperatur=(SELECT MAX(Temperatur) FROM wetterdaten01) LIMIT 1;";
    $actual_tops = $db->query($get_topwerte);
    while($data = $actual_tops->fetch_array()) {
        $parameter = 'Höchste Temperatur';
        $wert = $data[0] / umrechnung_temp . "°C";
        $datum = $data[1];
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Tiefste Temperatur
    $get_topwerte04 = "SELECT Temperatur, DATE_FORMAT(datetime,'%Y-%m-%d') FROM wetterdaten01 WHERE Temperatur=(SELECT MIN(Temperatur) FROM wetterdaten01) LIMIT 1;";
    $actual_tops4 = $db->query($get_topwerte04);
    while($data4 = $actual_tops4->fetch_array()) {
        $parameter = 'Tiefste Temperatur';
        $wert = $data4[0] / umrechnung_temp . "°C";
        $datum = $data4[1];
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Stärkste Böe
    $get_topwerte02 = "SELECT Windboen, DATE_FORMAT(datetime,'%Y-%m-%d') FROM wetterdaten01 WHERE Windboen=(SELECT MAX(Windboen) FROM wetterdaten01) LIMIT 1;";
    $actual_tops2 = $db->query($get_topwerte02);
    while($data2 = $actual_tops2->fetch_array()) {
        $parameter = 'Stärkste Böe';
        $wert = $data2[0] . " km/h";
        $datum = $data2[1];
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Jahresniederschlag
    $get_topwerte4 = "SELECT (SELECT MAX(Regen) FROM wetterdaten01)-(SELECT MIN(Regen) FROM wetterdaten01) AS Gesamt;";
    $actual_tops4 = $db->query($get_topwerte4);
    while($data_4 = $actual_tops4->fetch_array()) {
        $parameter = 'Jahresniederschlag';
        $wert = $data_4[0] / umrechnung_niederschlag . " L/m²";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Jahresmitteltemperatur
    $get_avg_jahresmittel = "SELECT AVG(Temperatur) AS Jahresmitteltemperatur FROM wetterdaten01;";
    $avg_year = $db->query($get_avg_jahresmittel);
    while($data_AVGYEAR = $avg_year->fetch_array()) {
        $parameter = 'Jahresmitteltemperatur';
        $wert = round($data_AVGYEAR[0] / umrechnung_temp, 2) . "°C";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Warme Tage (Tmax >25°C u <30°C)
    $get_warme_tage = "SELECT COUNT(*) FROM tageshöchstwerte WHERE Höchstwert BETWEEN 25 AND 29.9;";
    $warmetage = $db->query($get_warme_tage);
    while($data5 = $warmetage->fetch_array()) {
        $parameter = 'Anzahl der warmen Tage (Tmax >25°C u <30°C)';
        $wert = $data5[0] . " Tage";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Heiße Tage (Tmax >30°C u <35°C)
    $get_heiße_tage = "SELECT COUNT(*) FROM tageshöchstwerte WHERE Höchstwert BETWEEN 30 AND 34.9;";
    $heißetage = $db->query($get_heiße_tage);
    while($data6 = $heißetage->fetch_array()) {
        $parameter = 'Anzahl der heißen Tage (Tmax >30°C u <35°C)';
        $wert = $data6[0] . " Tage";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Wüstentage (Tmax >35°C)
    $get_wuesten_tage = "SELECT COUNT(*) FROM tageshöchstwerte WHERE Höchstwert >= 35;";
    $wuestentage = $db->query($get_wuesten_tage);
    while($data7 = $wuestentage->fetch_array()) {
        $parameter = 'Anzahl der Wüstentage (Tmax >35°C)';
        $wert = $data7[0] . " Tage";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Mittlere Feuchte
    $get_avg_feuchte = "SELECT AVG(Feuchte) AS Mittlerefeuchte FROM wetterdaten01;";
    $avg_feuchte = $db->query($get_avg_feuchte);
    while($data_AVG_FEUCHTE = $avg_feuchte->fetch_array()) {
        $parameter = 'Mittlere Feuchte';
        $wert = round($data_AVG_FEUCHTE[0], 2) . " %";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Höchster Luftdruck
    $get_max_pressure = "SELECT DATE(datetime), MAX(airpressure) AS MaxPressure FROM airpressure;";
    $max_pressure = $db->query($get_max_pressure);
    while($data_max_pressure = $max_pressure->fetch_array()) {
        $parameter = 'Höchster Luftdruck';
        $wert = round($data_max_pressure[1] / umrechnung_luftdruck, 0) . " hPA";
        $datum = $data_max_pressure[0];
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Tiefster Luftdruck
    $get_min_pressure = "SELECT DATE(datetime), MIN(airpressure) AS MINPressure FROM airpressure;";
    $min_pressure = $db->query($get_min_pressure);
    while($data_min_pressure = $min_pressure->fetch_array()) {
        $parameter = 'Tiefster Luftdruck';
        $wert = round($data_min_pressure[1] / umrechnung_luftdruck, 0) . " hPA";
        $datum = $data_min_pressure[0];
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    // Mittlerer Luftdruck
    $get_avg_pressure = "SELECT DATE(datetime), AVG(airpressure) AS AVGPressure FROM airpressure;";
    $avg_pressure = $db->query($get_avg_pressure);
    while($data_avg_pressure = $avg_pressure->fetch_array()) {
        $parameter = 'Mittlerer Luftdruck';
        $wert = round($data_avg_pressure[1] / umrechnung_luftdruck, 0) . " hPA";
        $datum = date("Y-m-d");
        insertIntoDatabase($db, $parameter, $wert, $datum,$ini);
    }

    mysqli_close($db);
?>
