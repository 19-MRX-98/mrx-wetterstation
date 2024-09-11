<?php
   // require_once("/var/www/html/src/conf/config.inc.php");
    require_once("/var/www/html/src/php/modules/functions/func_dewpoint.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_temp_and_humidity.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_airpressure.php");

    function saturationVaporPressure($gerechnete_temperatur) {
        return 6.112 * exp((17.67 * $gerechnete_temperatur) / ($gerechnete_temperatur + 243.5));
    }
    
    function calculateThetaE($gerechnete_temperatur, $taupunkt, $pressure) {
        $L = 2501000; // Latente Verdampfungswärme in J/kg
        $R_v = 461.5; // Gaskonstante für Wasserdampf in J/(kg·K)
        $c_p = 1004; // spezifische Wärmekapazität der Luft in J/(kg·K)
    
        // Schritt 1: Sättigungsdampfdruck (e_s)
        $e_s_T = saturationVaporPressure($gerechnete_temperatur);
        $e_s_T_d = saturationVaporPressure($gerechnete_temperatur);
    
        // Schritt 2: Tatsächlicher Dampfdruck (e)
        $e = $e_s_T_d;
    
        // Schritt 3: Mischungsverhältnis (w)
        $w = 0.622 * $e / ($pressure - $e);
    
        // Schritt 4: Temperatur auf 1000 hPa reduziert (theta)
        $theta = ($gerechnete_temperatur + 273.15) * pow((1000 / $pressure), 0.2854);
    
        // Schritt 5: Äquivalentpotenzielle Temperatur (theta_e)
        $theta_e = $theta * exp(($L * $w) / ($c_p * ($gerechnete_temperatur + 273.15)));
    
        // Resultat in Grad Celsius
        $theta_e_celsius = $theta_e - 273.15;
    
        return $theta_e_celsius;
    }
    calculateThetaE($gerechnete_temperatur, $taupunkt, $pressure);
?>
