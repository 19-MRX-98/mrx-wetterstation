<?php
$current_month = date("n");
    $get_connectionstring = new mysqli($dbsrv,$dbuser,$passwd,$database);
        $first_query = "SELECT datetime,Regen FROM wetterdaten2023 PARTITION (p_wetterdaten_23_7) ORDER BY datetime ASC LIMIT 1";
            $first_result = mysqli_query($get_connectionstring, $first_query);
                $first_row = mysqli_fetch_assoc($first_result);
    ///Erster Wert Pro Monat
    ///zweiter Wert Pro Monat
        $last_query = "SELECT datetime,Regen FROM wetterdaten2023 PARTITION (p_wetterdaten_23_7) ORDER BY datetime DESC LIMIT 1";
            $last_result = mysqli_query($get_connectionstring, $last_query);
                $last_row = mysqli_fetch_assoc($last_result);
    //Berechnung + Überprüfung ob Array = 0
        if(is_null($last_row))
            {
                echo "Kein Regen oder Datum in der Zukunft";
            }
        else 
            {
                $x = $last_row['Regen'] - $first_row['Regen'];
                $x2 = $x / 10;
                $ausg = $x2;
                echo $ausg;
            }
            mysqli_close($get_connectionstring);
?>