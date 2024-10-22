<?php
	$on = check_airpressure_avail($airpressure_module);
	if($on === 1){
		$db_c = connect_to_db($dbsrv, $dbuser, $passwd, $database);
		if($db_c->connect_errno)
				{
					echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
					echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
				}
				else
				{
					$get_airpressure = "SELECT * FROM airpressure ORDER BY datetime DESC LIMIT 1";
					$actual_airpressure = $db_c->query($get_airpressure);
					while($p = $actual_airpressure->fetch_array())
						{
                            $airpressure_act = $p[1]/$ini['umrechnung_luftdruck'];
                        }
                    mysqli_close($db_c);
                }
	}
	else{
		echo "Bitte das Luftdruckmodul in der Adminkonsole aktivieren";
		logs("Das Luftdruckmodul ist nicht aktiviert","ERROR");
	}
?>