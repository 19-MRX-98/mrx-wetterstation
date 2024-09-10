<?php
$db = new mysqli("192.168.1.22","root","1.z7ADF!D","tkf_admin");
if($db->connect_errno)
        {
            echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
            echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
        }
        else
        {
            $get_infrastructure = "SELECT * FROM `tkf.infrastructure` where id_infrastructure='1'";
            $infrastructure = $db->query($get_infrastructure);
            while($data = $infrastructure->fetch_array())
                {
                    $id=$data[0];
                    $wsname= $data[1];
                    $database=$data[2];
                    $dbuser=$data[3];
                    $dbport=$data[4];
                    $passwd=$data[5];
                    $dbsrv=$data[6];
                    $airpressure_module=$data[7];
                    $uvmodule=$data[8];
                }
                $get_dbc_inform = "SELECT * FROM tkf_dbc";
                $dbc_inform = $db->query($get_dbc_inform);
                while($data1 = $dbc_inform->fetch_array())
                    {
                        $dbc_id=$data1[0];
                        $id_tkf_container= $data1[1];
                        $tkf_container_name=$data1[2];
                        $tkf_dbc_port=$data1[3];
                        $tkf_dbc_host=$data1[4];
                        $tkf_dbc_user=$data1[5];
                        $tkf_dbc_passwd=$data1[6];
                    }
            }
            mysqli_close($db);
date_default_timezone_set('Europe/Berlin');
define("WIND_DIRECTION_N", 'Nord');
define("WIND_DIRECTION_NNE", 'Nord-Nord-Ost');
define("WIND_DIRECTION_NE", 'Nord-Ost');
define("WIND_DIRECTION_ENE", 'Ost-Nord-Ost');
define("WIND_DIRECTION_E", 'Ost');
define("WIND_DIRECTION_ESE", 'Ost-Süd-Ost');
define("WIND_DIRECTION_SE", 'Süd-Ost');
define("WIND_DIRECTION_SSE", 'Süd-Süd-Ost');
define("WIND_DIRECTION_S", 'Süd');
define("WIND_DIRECTION_SSW", 'Süd-Süd-West');
define("WIND_DIRECTION_SW", 'Süd-West');
define("WIND_DIRECTION_WSW", 'West-Süd-West');
define("WIND_DIRECTION_W", 'West');
define("WIND_DIRECTION_WNW", 'West-Nord-West');
define("WIND_DIRECTION_NW", 'Nord-West');
define("WIND_DIRECTION_NNW", 'Nord-Nord-West');
define("WIND_DIRECTION_ERROR", 'Messfehler oder keine Daten');
define('umrechnung_temp', 10);
define('umrechnung_wind1',10);
define('umrechnung_wind2',3.6);
define('umrechnung_wind_spitzen1',10);
define('umrechnung_wind_spitzen2',3.6);
define('umrechnung_niederschlag',10);
define('niederschlagsdifferenz',0.6);
define('umrechnung_luftdruck',1000);
define('standard_athmosphaere_1',237.7);
define('standard_athmosphaere_2',17.27);
define('laengengrad',52.4077183);
define('breitengrad',-8.0015624);
define('trockenadiabatischer_temperaturgradient',9.8);
define('feuchtdiabetischer_temperaturgradient',5.5);
?>
