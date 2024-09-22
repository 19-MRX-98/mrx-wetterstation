<?php

    require_once("/tkf_com/global_functions/global_functions.php");
    $scriptname=$_SERVER['SCRIPT_NAME'];

    // Verbindung zur Datenbank herstellen
    $db = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
    // Überprüfen, ob die Verbindung erfolgreich war
    if ($db->connect_error) {
        die("Verbindung fehlgeschlagen: " . $db->connect_error);
        logs("$scriptname => Datenbankverbindung fehlgeschlagen. Für weitere Informatione bitte den DBC Log prüfen","ERROR");
    }

    // Überprüfen, ob die Verbindung erfolgreich war
    if ($db) {

        // Tabelle niederschlaege2024 leeren
        $delete_query = "TRUNCATE TABLE niederschlaege2024";
        if (mysqli_query($db, $delete_query)) {
            echo "Tabelle niederschlaege2024 wurde geleert.<br>";
            logs("$scriptname => Tabelle niederschlaege2024 geleert","INFO");
        } else {
            logs("$scriptname => Fehler beim Leeren der Tabelle: " . mysqli_error($db) . "<br>","ERROR");
        }

        // Durch alle 12 Monate iterieren
        for ($month = 1; $month <= 12; $month++) {
            // Partition für den aktuellen Monat anpassen
            $partition = str_pad($month, 2, '0', STR_PAD_LEFT); // Monat im Format 01, 02, ..., 12

            // Abfrage für den ersten Datensatz des Monats
            $first_query = "SELECT datetime, Regen FROM wetterdaten01 PARTITION (p_wetterdaten_act_$partition) ORDER BY datetime ASC LIMIT 1";
            $first_result = mysqli_query($db, $first_query);
            $first_row = mysqli_fetch_assoc($first_result);

            // Abfrage für den letzten Datensatz des Monats
            $last_query = "SELECT datetime, Regen FROM wetterdaten01 PARTITION (p_wetterdaten_act_$partition) ORDER BY datetime DESC LIMIT 1";
            $last_result = mysqli_query($db, $last_query);
            $last_row = mysqli_fetch_assoc($last_result);

            // Überprüfen, ob Datensätze für den Monat vorhanden sind
            if (is_null($last_row) || is_null($first_row)) {
                echo "Kein Regen oder Datum für Monat $month vorhanden<br>";
                continue; // Weiter zum nächsten Monat
            }

            // Berechnung des Niederschlags für den Monat
            $niederschlag = ($last_row['Regen'] - $first_row['Regen']) / 10;

            // Ergebnis ausgeben
            echo "Niederschlag im Monat $month: $niederschlag<br>";

            // In die Datenbanktabelle einfügen
            $insert_query = "INSERT INTO niederschlaege2024 (monat, niederschlag) VALUES ($month, $niederschlag)";
            if (mysqli_query($db, $insert_query)) {
                echo "<br>";
                logs("$scriptname =>Daten für Monat $month erfolgreich gespeichert.<br>","INFO");
            } else {
                echo "Fehler beim Speichern der Daten für Monat $month: " . mysqli_error($db) . "<br>";
            }
        }

        // Verbindung schließen
        mysqli_close($db);
        } 
    else {
        echo "Verbindung zur Datenbank fehlgeschlagen";
        logs("$scriptname =>Verbindung zur Datenbank fehlgeschlagen","INFO");
    }
?>