<?php
    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
    $first_query = "SELECT datetime,Regen FROM wetterdaten2024 PARTITION (p_wetterdaten_24_7) ORDER BY datetime ASC LIMIT 1";
            $first_result = mysqli_query($db, $first_query);
                $first_row = mysqli_fetch_assoc($first_result);
    ///Erster Wert Pro Monat
    ///zweiter Wert Pro Monat
        $last_query = "SELECT datetime,Regen FROM wetterdaten2024 PARTITION (p_wetterdaten_24_9) ORDER BY datetime DESC LIMIT 1";
            $last_result = mysqli_query($db, $last_query);
                $last_row = mysqli_fetch_assoc($last_result);
    //Berechnung + Überprüfung ob Array = 0
        if(is_null($last_row))
            {
                echo "-";
            }
        else 
            {
                $x = $last_row['Regen'] - $first_row['Regen'];
                $x2 = $x / 10;
                $ausg = $x2;
                echo $ausg." L/qm²";
            }
    mysqli_close($db);
?>