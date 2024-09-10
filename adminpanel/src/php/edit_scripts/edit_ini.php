<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $section = $_POST['section'];
        $key = $_POST['key'];
        $value = $_POST['value'];
    
        // .ini Datei auslesen
        $ini_array = parse_ini_file("/tkf_ini/comserver.ini", true, INI_SCANNER_RAW);
    
        // Wert aktualisieren
        if (isset($ini_array[$section][$key])) {
            $ini_array[$section][$key] = $value;
        }
    
        // Änderungen zurück in die .ini Datei schreiben
        $new_content = '';
        foreach ($ini_array as $section => $values) {
            $new_content .= "[$section]\n";
            foreach ($values as $key => $value) {
                $new_content .= "$key = \"$value\"\n";
            }
        }
    
        file_put_contents('/tkf_ini/comserver.ini', $new_content);
    
        // Zurück zur Hauptseite
        header('Location: /connector_config');
        exit();
    }
?>