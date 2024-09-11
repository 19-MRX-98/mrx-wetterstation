<?php

    require_once("/var/www/html/src/php/modules/querys/select_act_airpressure.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_wind_direction.php");

    function zambrettiForecast($pressure, $windDirection) {
        // Vereinfachte Zambretti-Logik (Anpassung je nach Bedarf)
        if ($pressure > 1020) {
            if ($windDirection >= 0 && $windDirection <= 8) {
                return "Leicht bis mäßig bewölkt";
            } else {
                return "Stabiles, Sonniges Wetter";
            }
        } elseif ($pressure > 1000) {
            if ($windDirection >= 0 && $windDirection <= 8) {
                return "Veränderliches Wetter; Regen Möglich, Winddrehung auf West/Nordwest";
            } else {
                return "Veränderliches Wetter; Schauer oder Gewitter";
            }
        } else {
            if ($windDirection >= 0 && $windDirection <= 8) {
                return "Regnerisch";
            } else {
                return "Sturm";
            }
        }
    }
?>