<?php
    require_once("src/php/modules/log_modules/log_parse.php");
// Pfad zur README-Datei
$lic_path = 'src/misc/LICENSE';

// Überprüfen, ob die Datei existiert
if (file_exists($lic_path)) {
    // Inhalt der README-Datei lesen und ausgeben
    $lic_content = file_get_contents($lic_path);
    echo nl2br($lic_content); // Um Zeilenumbrüche zu erhalten, verwende nl2br
} else {
    echo 'Die LICENSE Datei existiert nicht.';
}
?>