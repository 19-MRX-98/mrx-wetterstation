<?php
$db = connect_to_db($dbsrv, $dbuser, $passwd, $database);

function avg_month($db) {
    // Verbindung zur Datenbank herstellen
    if ($db->connect_errno) {
        echo "Keine Verbindung möglich! Bitte kontaktieren Sie den Administrator!\n";
        echo "Fehler " . $db->connect_errno . ": " . $db->connect_error;
        exit;
    } else {
        // SQL-Abfrage, die die Monate in der richtigen Reihenfolge ausgibt
        $getabw = "
            SELECT * 
            FROM abweichungen_2023
            ORDER BY FIELD(Monat, 
                'January', 'February', 'March', 'April', 'May', 'June', 
                'July', 'August', 'September', 'October', 'November', 'December');
        ";
        
        $actual_abw = $db->query($getabw);
        if ($actual_abw->num_rows > 0) {
            echo "
                <div class='table-responsive'>
                    <table class = 'table table-hover'>
                        <thead class='table-primary'>
                            <th scope='col'>Mitteltemperatur in °C</th>
                            <th scope='col'>Abweichung LjM in °C</th>
                            <th scope='col'>Hinweis</th>
                        </thead>
                        <tbody class='table-group-divider'>
            ";
            
            // Array zur Übersetzung der Monatsnamen
            $month_translation = array(
                'January' => 'Januar',
                'February' => 'Februar',
                'March' => 'März',
                'April' => 'April',
                'May' => 'Mai',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'August',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Dezember'
            );
            
            while ($data = $actual_abw->fetch_array()) {
                // Monat in Deutsch übersetzen
                $month_in_german = $month_translation[$data[0]] ?? $data[0];
                
                echo "
                    <tr>
                        <td>$month_in_german</td>
                        <td><center>".round($data[1],2)." °C</center></td>
                        <td>
                            <center>";
                            $differenz = round($data[2],2);
                            if($differenz >= '0' && $differenz <= '0.5'){
                                echo "<center><button type='button' class='btn btn-primary'>". round($differenz,2)."</button></center>";
                            }
                            elseif($differenz > '0.5' && $differenz <= '1.0'){
                                echo "<center><button type='button' class='btn btn-info'>". round($differenz,2)."</button></center>";
                            }
                            elseif($differenz > '1.0' && $differenz <= '2.0'){
                                echo "<center><button type='button' class='btn btn-warning'>". round($differenz,2)."</button></center>";
                            }
                            elseif($differenz > '2.0'){
                                echo "<center><button type='button' class='btn btn-danger'>". round($differenz,2)."</button></center>";
                            }
                        echo "</center></td>
                    </tr>
                ";
            }
            echo "</table></div>";
        } else {
            echo "Keine Daten verfügbar.";
        }
    }
    // Verbindung schließen
    mysqli_close($db);
}

// Funktion aufrufen
avg_month($db);
?>