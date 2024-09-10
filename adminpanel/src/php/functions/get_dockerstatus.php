<?php
// URL der API, die abgefragt werden soll
$url = 'http://dev-srv01.riedel.lan:2375/v1.46/containers/json';

// Initialisieren der cURL-Sitzung
$ch = curl_init($url);

// Setzen der cURL-Optionen
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Rückgabe der Antwort als String
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// Ausführen der cURL-Sitzung
$response = curl_exec($ch);

// Fehlerbehandlung
if ($response === false) {
    $error = curl_error($ch);
    curl_close($ch);
    die('cURL-Fehler: ' . $error);
}

// Schließen der cURL-Sitzung
curl_close($ch);

// Dekodieren der JSON-Antwort
$data = json_decode($response, true);

// Überprüfen, ob die Dekodierung erfolgreich war
if (json_last_error() !== JSON_ERROR_NONE) {
    die('JSON-Dekodierungsfehler: ' . json_last_error_msg());
}

// Ausgabe der JSON-Daten
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

?>