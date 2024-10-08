<?php
// Verbindung zur Datenbank herstellen

require_once("functions/func_dewpoint.php");
$conn = connect_to_db($dbsrv, $dbuser, $passwd, $database);

// Taupunkt und Wolkengrenze berechnen
$sql = "SELECT Temperatur, Feuchte FROM $database.wetterdaten01 ORDER BY datetime DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $temperatur = $row["Temperatur"];
    $feuchte = $row["Feuchte"];
    $lufttemperatur = $temperatur/$ini['umrechnung_temp']; // Grad Celsius
    $luftfeuchtigkeit = $feuchte; // Prozent
    $taupunkt = taupunkt($lufttemperatur, $luftfeuchtigkeit);
  }
} else {
  echo "0 results";
}

$conn->close();
?>