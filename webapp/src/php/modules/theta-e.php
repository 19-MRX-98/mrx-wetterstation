<?php
	require_once("/var/www/html/src/php/modules/functions/func_theta_e.php");											
    $theta_e_celsius = calculateThetaE($gerechnete_temperatur, $taupunkt, $pressure);

    switch(true){
        case (round($theta_e_celsius,2) <= 40):
            echo "Theta-E: ". round($theta_e_celsius,2) ." °C<br><div class='alert alert-success' role='alert'>Gwitter unwahrscheinlich</div>";
            break;
        case (round($theta_e_celsius,2) >= 41 && round($theta_e_celsius,2) <= 50):
            echo "Theta-E: ". round($theta_e_celsius,2) ." °C<br><div class='alert alert-success' role='alert'>geringes Gwitterpotential</div>";
            break;
        case (round($theta_e_celsius,2) >= 50 && round($theta_e_celsius,2) <= 55):
            echo "Theta-E: ".round($theta_e_celsius,2) ." °C<br><div class='alert alert-warning' role='alert'>mittleres Gwitterpotential</div>";
            break;
        case (round($theta_e_celsius,2) >= 55 && round($theta_e_celsius,2) <= 60):
            echo "Theta-E: ". round($theta_e_celsius,2) ." °C<br><br><div class='alert alert-warning' role='alert'>hohes Gwitterpotential</div>";
            break;
        case (round($theta_e_celsius,2) > 60):
            echo "Theta-E: ". round($theta_e_celsius,2) ." °C<br><div class='alert alert-danger' role='alert'>Hohes Gewitterpotential u. Unwetterpotential</div>";
            break;
        default:
            echo "Berechnungsfehler 1";
            break;
        }

?>
