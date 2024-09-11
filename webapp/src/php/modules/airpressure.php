<?php
	if($ini['airpressure_module'] == 1){
		$db_c = new mysqli($dbsrv,$dbuser,$passwd,$database);
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
		echo "Please activate the Airpressuremodule";
	}

