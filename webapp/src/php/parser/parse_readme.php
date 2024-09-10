<?php
// Pfad zur README-Datei
$readme_path = 'src/misc/update.md';

// Überprüfen, ob die Datei existiert
if (file_exists($readme_path)) {
    // Inhalt der README-Datei lesen und ausgeben
    $readme_content = file_get_contents($readme_path);
    echo nl2br($readme_content); // Um Zeilenumbrüche zu erhalten, verwende nl2br
} else {
    echo 'Die README-Datei existiert nicht.';
}
?>