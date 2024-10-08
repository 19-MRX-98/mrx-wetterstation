<?php
    // Verbindung zur Datenbank herstellen
    try {
        $host= $ini['db_host'];
        $dbname = $ini['database'];
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $ini['db_username'], $ini['db_password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
    }

    $monats_nr_to_name = array(
        '1' => 'Januar',
        '2' => 'Februar',
        '3' => 'März',
        '4' => 'April',
        '5' => 'Mai',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'August',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Dezember'
    );

    function berechneMonatlichenNiederschlag($pdo) {
        $niederschlagProMonat = [];
    
        // Alle Monate durchlaufen (1 = Januar, 12 = Dezember)
        for ($monat = 1; $monat <= 12; $monat++) {
            // Ersten Niederschlagswert des Monats abrufen
            $stmtErsterWert = $pdo->prepare("
                SELECT Regen
                FROM wetterdaten2022
                WHERE MONTH(datetime) = :monat 
                ORDER BY datetime ASC 
                LIMIT 1
            ");
            $stmtErsterWert->execute(['monat' => $monat]);
            $ersterWert = $stmtErsterWert->fetchColumn();
    
            // Letzten Niederschlagswert des Monats abrufen
            $stmtLetzterWert = $pdo->prepare("
                SELECT Regen
                FROM wetterdaten2022
                WHERE MONTH(datetime) = :monat 
                ORDER BY datetime DESC 
                LIMIT 1
            ");
            $stmtLetzterWert->execute(['monat' => $monat]);
            $letzterWert = $stmtLetzterWert->fetchColumn();
    
            // Wenn sowohl der erste als auch der letzte Wert vorhanden sind, berechne die Differenz
            if ($ersterWert !== false && $letzterWert !== false) {
                $niederschlagProMonat[$monat] = $letzterWert - $ersterWert;
            } else {
                $niederschlagProMonat[$monat] = 0; // Kein Niederschlagswert verfügbar
            }
        }
    
        return $niederschlagProMonat;
    }
    // Monatlichen Niederschlag berechnen
    $niederschlagsdaten = berechneMonatlichenNiederschlag($pdo);

   // HTML-Ausgabe vorbereiten
echo "
<div class='table-responsive'>
    <table class='table table-hover'>
        <thead class='table-primary'>
            <tr>
                <th scope='col'>Monat</th>
                <th scope='col'>Niederschlag</th>
                <th scope='col'>Maßeinheit</th>
                <th scope='col'>Wasserampel</th>
            </tr>
        </thead>
        <tbody class='table-group-divider'>
";

// Ausgabe der Daten in der Tabelle
foreach ($niederschlagsdaten as $monat => $niederschlag) {
    $monatName = $monats_nr_to_name[$monat];
    $niederschlag_p_m = $niederschlag / $ini['umrechnung_temp'];  // Umrechnung gemäß ini

    if($niederschlag_p_m <= 40){
        #echo "Ampel Rot";
        $ampel="<img src='src/pictures/icons8/icons8-red-circle-48.png'alt=''/>";
    }
    elseif($niederschlag_p_m >= 40 && $niederschlag_p_m <= 60){
        #echo "Ampel Orange";
        $ampel="<img src='src/pictures/icons8/icons8-yellow-circle-48.png'alt=''/>";
    }
    elseif($niederschlag_p_m >= 60){
        #echo "Ampel Grün";
        $ampel="<img src='src/pictures/icons8/icons8-green-circle-48.png'alt='dd'/>";
    }

    // Zeile für jeden Monat hinzufügen
    echo "
        <tr>
            <td>$monatName</td>
            <td>$niederschlag_p_m</td>
            <td>L/qm²</td>
            <td>$ampel</td>
        </tr>
    ";
}

// Tabelle abschließen
echo "
        </tbody>
    </table>
</div>
";
?>
