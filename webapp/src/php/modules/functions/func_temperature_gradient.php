<?php

//benötigte Scripts
    require_once("/var/www/html/src/conf/config.inc.php");
    require_once("/var/www/html/src/php/modules/functions/func_dewpoint.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_temp_and_humidity.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_airpressure.php");
  

//Funktion Wolkenhöhe berechnen

    function calc_cloudbase($gerechnete_temperatur,$taupunkt){
       $delta_Tdiff = $gerechnete_temperatur - $taupunkt; 
       $hc =  $delta_Tdiff / trockenadiabatischer_temperaturgradient;

       return $hc;
    }
    calc_cloudbase($gerechnete_temperatur,$taupunkt);
/*-------------------------------------------------------------------------------- */
    $hc = calc_cloudbase($gerechnete_temperatur,$taupunkt); //Wolkenhöhe berechnen und übergeben
/*-------------------------------------------------------------------------------- */
    $hc_rounded = number_format($hc * 1000);

    //Funktion Wolkenuntertemperatur berechnen

    function calc_cloud_downtemp($hc, $gerechnete_temperatur){
        
        $temp_cloudbase = $gerechnete_temperatur - (trockenadiabatischer_temperaturgradient * $hc);

        return $temp_cloudbase;
    }
    calc_cloud_downtemp($hc,$gerechnete_temperatur);

/*-------------------------------------------------------------------------------- */
    $wolkenbasistemperatur = calc_cloud_downtemp($hc,$gerechnete_temperatur); //$HC übergeben
/*-------------------------------------------------------------------------------- */


    //Funktion Nullgradgrenze ab der Wolkenuntergrenze berechnen

    function calc_freezinglevel_above_clBase($wolkenbasistemperatur){

        $freezinglevel_above_clBase = $wolkenbasistemperatur / feuchtdiabetischer_temperaturgradient;

        return $freezinglevel_above_clBase;
    }
    calc_freezinglevel_above_clBase($wolkenbasistemperatur);

/*-------------------------------------------------------------------------------- */
    $freezinglevel_above_clBase = calc_freezinglevel_above_clBase($wolkenbasistemperatur); //$Wolkenbasistemperatur übergeben
/*-------------------------------------------------------------------------------- */
    

    //Funktion Berechnung Nullgradgrenze ab Grund

    function calc_freezinglevel_fromGround($freezinglevel_above_clBase, $hc){
        $freezinglevel_fromGround = $hc + $freezinglevel_above_clBase;

        return $freezinglevel_fromGround;
    }
    calc_freezinglevel_fromGround($freezinglevel_above_clBase, $hc);

/*-------------------------------------------------------------------------------- */
    $freezinglevel_fromGround =  calc_freezinglevel_fromGround($freezinglevel_above_clBase, $hc); 
/*-------------------------------------------------------------------------------- */



    //Funktion Berechnung -5Grad Isotherme 
    function calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc){

        $T_minus_5 = -5.0;
        $h5= ($wolkenbasistemperatur -($T_minus_5)) / feuchtdiabetischer_temperaturgradient;
        $hoehe_minus5 = $hc + $h5;

        return $hoehe_minus5;
    }
    calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc);

/*-------------------------------------------------------------------------------- */
    $hoehe_minus5 = calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc);
/*-------------------------------------------------------------------------------- */


    //Funktion Berechnung -10Grad Isotherme 
    function calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc){

        $T_minus_10 = -10;
        $h10= ($wolkenbasistemperatur -($T_minus_10)) / feuchtdiabetischer_temperaturgradient;
        $hoehe_minus10 = $hc + $h10;

        return $hoehe_minus10;
    }
    calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc);


/*-------------------------------------------------------------------------------- */
    $hoehe_minus10 = calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc);
/*-------------------------------------------------------------------------------- */


//Funktion Berechnung 1500m Höhe Temperatur
function calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc){

    $h = 1500 / 1000;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp1500 = $gerechnete_temperatur - (trockenadiabatischer_temperaturgradient * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp1500 = $wolkenbasistemperatur - (feuchtdiabetischer_temperaturgradient* ($h - $hc));
    }
    return $temp1500;
}
calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);

/*-------------------------------------------------------------------------------- */
$temp1500 = calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);
/*-------------------------------------------------------------------------------- */


//Funktion Berechnung 3000m Höhe Temperatur
function calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc){

    $h = 3;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp3000 = $gerechnete_temperatur - (trockenadiabatischer_temperaturgradient * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp3000 = $wolkenbasistemperatur - (feuchtdiabetischer_temperaturgradient* ($h - $hc));
    }
    return $temp3000;
}
calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);

/*-------------------------------------------------------------------------------- */
$temp3000 = calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);
/*-------------------------------------------------------------------------------- */

//Funktion Berechnung 5500m Höhe Temperatur
function calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc){

    $h = 5500 / 1000;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp5500 = $gerechnete_temperatur - (trockenadiabatischer_temperaturgradient * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp5500 = $wolkenbasistemperatur - (feuchtdiabetischer_temperaturgradient* ($h - $hc));
    }
    return $temp5500;
}
calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);

/*-------------------------------------------------------------------------------- */
$temp5500 = calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc);
/*-------------------------------------------------------------------------------- */

?>