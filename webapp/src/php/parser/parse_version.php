<?php
    require_once("src/php/modules/log_modules/log_parse.php");
    // Pfad zur README-Datei
    $version_path = 'src/misc/version.txt';

    // Überprüfen, ob die Datei existiert
    if (file_exists($version_path)) {
        // Inhalt der README-Datei lesen und ausgeben
        $version_content = file_get_contents($version_path);
        echo nl2br($version_content); // Um Zeilenumbrüche zu erhalten, verwende nl2br
    } else {
        echo 'Die Versionsdatei existiert nicht.';
    }
?>