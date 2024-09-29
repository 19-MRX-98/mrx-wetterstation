<?php
require_once("/tkf_com/global_functions/global_functions.php");

$db = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);

$stmt = $db->prepare("SELECT monat, monatsmitteltemperatur FROM view_update_monatsmittel;");
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $monat = $row["monat"];
        $monatsmitteltemperatur = $row["monatsmitteltemperatur"];

        // 2. Hole das langjährige Mittel für den aktuellen Monat aus der jahresmittel_1991_2020 Tabelle
        $abfrage2 = $db->prepare("SELECT $monat FROM jahresmittel_1991_2020 WHERE selected = '1'");
        $abfrage2->execute();
        $result2 = $abfrage2->get_result();

        if (mysqli_num_rows($result2) > 0) {
            while ($row1 = mysqli_fetch_array($result2)) {
                $langzeitmittel = $row1[$monat];
            }

            // 3. Berechne die Abweichung
            $abweichung = $monatsmitteltemperatur - $langzeitmittel;

            // 4. Füge die Monatsmitteltemperatur und die Abweichung in die abweichungen_act_year Tabelle ein oder aktualisiere bestehende Werte
            $insert_stmt = $db->prepare(
                "INSERT INTO abweichungen_act_year (monat, monatsmitteltemperatur, abweichung)
                 VALUES (?, ?, ?)
                 ON DUPLICATE KEY UPDATE 
                 monatsmitteltemperatur = VALUES(monatsmitteltemperatur), 
                 abweichung = VALUES(abweichung)"
            );
            $insert_stmt->bind_param("sdd", $monat, $monatsmitteltemperatur, $abweichung);

            if ($insert_stmt->execute()) {
                echo "Daten für Monat $monat erfolgreich eingefügt oder aktualisiert.\n";
                logs("Daten für Monat $monat erfolgreich eingefügt oder aktualisiert.", 'INFO');
            } else {
                echo "Fehler beim Einfügen oder Aktualisieren der Daten für Monat $monat: " . $db->error . "\n";
                logs("Fehler beim Einfügen oder Aktualisieren der Daten für Monat $monat.", 'ERROR');
            }
        } else {
            echo "Kein langjähriges Mittel für Monat $monat gefunden.\n";
            logs("Fataler Fehler: Datenbanktabelle existiert? Datenbanktabelle: jahresmittel_1991_2020.", 'ERROR');
        }
    }
} else {
    echo "Keine Monatsdaten verfügbar.\n";
    logs("Fataler Fehler: Besteht eine Datenbankverbindung? Datenbank: $dbsrv", 'ERROR');
}
?>
