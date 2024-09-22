<?php
require_once("/tkf_com/global_functions/global_functions.php");
$db = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
		if($db->connect_errno)
				{
					echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
					echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
				}
				else
				{
                    $set_upd = "create or replace view view_gruenlandtemp_JAN AS
                    SELECT AVG(Temperatur)/10*0.5 AS gruenlandtemperatursumme from $ini[weatherdata_tbl] where monthname(datetime)='january' AND Temperatur >0 group by date(datetime)";
                    $update_views= $db->query($set_upd);
                    $create_sum = "select sum(gruenlandtemperatursumme) from view_gruenlandtemp_JAN";
                    $create_sum= $db->query($create_sum);
                    echo "Tabellen Aktualisiert";
                }
                //echo $i;
                mysqli_close($db);
?>