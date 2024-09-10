<?php
    require_once("/tkf_com/global_functions/global_functions.php");
    $conn = connect_to_admindb($dbsrv, $dbuser, $passwd, $tkf_adm);
            $get_infrastructure = "SELECT * FROM `tkf.infrastructure` where id_infrastructure='1'";
            $infrastructure = $conn->query($get_infrastructure);
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
    $conn->close();
    define("API_KEY","4450ede91f808d165263d1196233a338");
    define("POST_CODE","49565");
    define("COUNTRY_CODE","DE");
?>
