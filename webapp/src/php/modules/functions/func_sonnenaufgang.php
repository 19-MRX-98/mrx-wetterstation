<?php
require_once("src/conf/config.inc.php");
function astrodate_sun_up($dbsrv,$dbuser,$passwd,$database){

    $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
    if($db->connect_errno)
            {
                echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
                echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
            }
            else
            {
                $get_lat_long="SELECT Breite,Laenge FROM jahresmittel_1991_2020 WHERE selected = 1";
                        $lat_long= $db->query($get_lat_long);
                        while($data_lat_long = $lat_long->fetch_array()){
                            $laengegrad = $data_lat_long[0];
                            $breitengrad = $data_lat_long[1];
                        }
                        
            }
            mysqli_close($db);

            $date = date("d.m.Y");
            $sun_info=date_sun_info(strtotime($date),laengengrad,breitengrad);
            $sonnenaufgang = $sun_info['sunrise'];
            //print_r($sun_info);
            $erg = date("r",$sonnenaufgang);
            echo $erg;
        }
        astrodate_sun_up($dbsrv,$dbuser,$passwd,$database);
?>