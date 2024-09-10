<?php
    require_once("php/globals/constants.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
        <script src="js/bootstrap.bundle.min.js" async></script>
        <script src="js/sidebar.js" async></script>
        <script src="js/colormode.js" async></script>
        <script src="js/popover.js" async></script>
        <title>Cloudpanel</title>   
    </head>
        <body>
            <?php
                $ini_path = ini_path;
                function parseIniToArray($filename) {
                    // Prüfe, ob die Datei existiert
                    if (!file_exists($filename)) {
                        return false;
                    }
                    
                    // Lese die INI-Datei ein
                    $data = parse_ini_file($filename,true);
                    
                    return $data;
                }
            
                function writeArrayToIni($config, $section, $file) {
                    $content = "; [$section] Configuration\n";
                
                    foreach ($config as $key => $value) {
                        $content .= "$key = $value\n";
                    }
                
                    // Schreiben des Inhalts in die Datei
                    file_put_contents($file, $content);
                }
                // Funktion zum Schreiben eines Arrays in eine INI-Datei
                
                // Pfad zur INI-Datei
                
                // Überprüfen, ob die INI-Datei die erforderlichen Werte enthält
                $dataArray = parseIniToArray($ini_path);
                if(isset($dataArray['server']) && isset($dataArray['user']) && isset($dataArray['password'])) {
                    echo "Initialisierung der Datenbank erfolgreich!";
                    // Weiterleitung zur anderen Seite
                    echo "<a class='btn btn-primary' href='/ba41f6a85c1ee640d7b7ee303aa6312320b9a55a' role='button'>Zum Admininterface</a>";
                    exit; // Beenden des Skripts nach der Weiterleitung
                } else {
                    // Wenn die INI-Datei nicht die erforderlichen Werte enthält, Formular anzeigen und Daten darin speichern
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Neuen Wert erstellen
                        $new_val = [
                            'server' => $_POST['inputdbsrv'],
                            'user' => $_POST['inputdbuser'],
                            'password' => $_POST['inputdbusrpw']
                        ];
                
                        // Schreiben des neuen Werts in die INI-Datei
                        writeArrayToIni($new_val, 'dbserver', $ini_path);
                        
                        // Erfolgsmeldung anzeigen
                        echo "Datenbankparameter erfolgreich gespeichert!";
                        // Weiterleitung zur anderen Seite
                        echo "Erstelle Datenbanken";
                        $conn = new mysqli($_POST['inputdbsrv'], $_POST['inputdbuser'], $_POST['inputdbusrpw']);

                        // Überprüfen, ob eine Verbindung erfolgreich hergestellt wurde
                        if ($conn->connect_error) {
                            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
                        }

                        // Überprüfen, ob die Datenbanken existieren
                        $database_check_query = "SHOW DATABASES LIKE 'wetterstation'";
                        $result = $conn->query($database_check_query);

                        if ($result->num_rows == 0) {
                            // Wenn die Datenbank 'wetterstation' nicht existiert, erstelle sie aus einer SQL-Datei
                            $sql_file_wetterstation = 'sql/wetterstation.sql';
                            if (file_exists($sql_file_wetterstation)) {
                                $sql = file_get_contents($sql_file_wetterstation);
                                if ($conn->multi_query($sql) === TRUE) {
                                    echo "Datenbank 'wetterstation' erfolgreich erstellt.";
                                } else {
                                    echo "Fehler beim Erstellen der Datenbank 'wetterstation': " . $conn->error;
                                }
                            } else {
                                echo "Die SQL-Datei 'wetterstation.sql' wurde nicht gefunden.";
                            }
                        }
                    }
                }
                include("html/footer.html");
            ?>
        </body>
</html>
