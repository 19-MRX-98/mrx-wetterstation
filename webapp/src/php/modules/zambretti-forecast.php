<?php
    $forecast = zambrettiForecast($pressure, $windrichtung);
    echo "Aufgrund des aktuell vorherrschenden Luftdrucks von $pressure hPA und der aktuellen Windrichtung, kann man davon ausgehen, dass sich in den nächsten 24 Stunden das Wetter wie folgt ändert: $forecast<br>";
?>
