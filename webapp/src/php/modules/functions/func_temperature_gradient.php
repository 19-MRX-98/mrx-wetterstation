<?php

//benötigte Scripts
    //require_once("/var/www/html/src/conf/config.inc.php");
    require_once("/var/www/html/src/php/modules/functions/func_dewpoint.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_temp_and_humidity.php");
    require_once("/var/www/html/src/php/modules/querys/select_act_airpressure.php");
  

//Funktion Wolkenhöhe berechnen

    function calc_cloudbase($gerechnete_temperatur,$taupunkt,$ini){
       $delta_Tdiff = $gerechnete_temperatur - $taupunkt; 
       $hc =  $delta_Tdiff / $ini['trockenadiabatischer_temperaturgradient'];

       return $hc;
    }
    calc_cloudbase($gerechnete_temperatur,$taupunkt,$ini);
/*-------------------------------------------------------------------------------- */
    $hc = calc_cloudbase($gerechnete_temperatur,$taupunkt,$ini); //Wolkenhöhe berechnen und übergeben
/*-------------------------------------------------------------------------------- */
    $hc_rounded = number_format($hc * 1000);

    //Funktion Wolkenuntertemperatur berechnen

    function calc_cloud_downtemp($hc, $gerechnete_temperatur,$ini){
        $trockendiabetischer_gradient=$ini['trockenadiabatischer_temperaturgradient'];
        $temp_cloudbase = $gerechnete_temperatur - ($trockendiabetischer_gradient * $hc);

        return $temp_cloudbase;
    }
    calc_cloud_downtemp($hc,$gerechnete_temperatur,$ini);

/*-------------------------------------------------------------------------------- */
    $wolkenbasistemperatur = calc_cloud_downtemp($hc,$gerechnete_temperatur,$ini); //$HC übergeben
/*-------------------------------------------------------------------------------- */


    //Funktion Nullgradgrenze ab der Wolkenuntergrenze berechnen

    function calc_freezinglevel_above_clBase($wolkenbasistemperatur,$ini){

        $freezinglevel_above_clBase = $wolkenbasistemperatur / $ini['feuchtdiabetischer_temperaturgradient'];

        return $freezinglevel_above_clBase;
    }
    calc_freezinglevel_above_clBase($wolkenbasistemperatur,$ini);

/*-------------------------------------------------------------------------------- */
    $freezinglevel_above_clBase = calc_freezinglevel_above_clBase($wolkenbasistemperatur,$ini); //$Wolkenbasistemperatur übergeben
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
    function calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc,$ini){

        $T_minus_5 = -5.0;
        $h5= ($wolkenbasistemperatur -($T_minus_5)) / $ini['feuchtdiabetischer_temperaturgradient'];
        $hoehe_minus5 = $hc + $h5;

        return $hoehe_minus5;
    }
    calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc,$ini);

/*-------------------------------------------------------------------------------- */
    $hoehe_minus5 = calc_minus5degrees_isotherme($wolkenbasistemperatur,$hc,$ini);
/*-------------------------------------------------------------------------------- */


    //Funktion Berechnung -10Grad Isotherme 
    function calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc,$ini){

        $T_minus_10 = -10;
        $h10= ($wolkenbasistemperatur -($T_minus_10)) / $ini['feuchtdiabetischer_temperaturgradient'];
        $hoehe_minus10 = $hc + $h10;

        return $hoehe_minus10;
    }
    calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc,$ini);


/*-------------------------------------------------------------------------------- */
    $hoehe_minus10 = calc_minus10degrees_isotherme($wolkenbasistemperatur,$hc,$ini);
/*-------------------------------------------------------------------------------- */


//Funktion Berechnung 1500m Höhe Temperatur
function calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini){

    $h = 1500 / 1000;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp1500 = $gerechnete_temperatur - ($ini['trockendiabetischer_temperaturgradient'] * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp1500 = $wolkenbasistemperatur - ($ini['feuchtdiabetischer_temperaturgradient'] * ($h - $hc));
    }
    return $temp1500;
}
calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);

/*-------------------------------------------------------------------------------- */
$temp1500 = calc_1500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);
/*-------------------------------------------------------------------------------- */


//Funktion Berechnung 3000m Höhe Temperatur
function calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini){

    $h = 3;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp3000 = $gerechnete_temperatur - ($ini['trockendiabetischer_temperaturgradient'] * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp3000 = $wolkenbasistemperatur - ($ini['feuchtdiabetischer_temperaturgradient'] * ($h - $hc));
    }
    return $temp3000;
}
calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);

/*-------------------------------------------------------------------------------- */
$temp3000 = calc_3000m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);
/*-------------------------------------------------------------------------------- */

//Funktion Berechnung 5500m Höhe Temperatur
function calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini){

    $h = 5500 / 1000;  // Höhe in km

    // 
    if ($h <= $hc) {
        // Höhe unterhalb der Wolkenuntergrenze
        $temp5500 = $gerechnete_temperatur - ($ini['trockendiabetischer_temperaturgradient'] * $h);
    } else {
        // Höhe oberhalb der Wolkenuntergrenze
        $temp5500 = $wolkenbasistemperatur - ($ini['feuchtdiabetischer_temperaturgradient'] * ($h - $hc));
    }
    return $temp5500;
}
calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);

/*-------------------------------------------------------------------------------- */
$temp5500 = calc_5500m_temp($gerechnete_temperatur,$wolkenbasistemperatur,$hc,$ini);
/*-------------------------------------------------------------------------------- */

?>