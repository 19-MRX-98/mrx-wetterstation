<?php
$db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
function rainfall_actual($db)
{
    $zeitstempel = time();
    $Zeit_back05 = $zeitstempel - (20 * 60);
    $old_time=date("Y-m-d H:i:s.000000", $Zeit_back05);
    $actual_time = date("Y-m-d H:i:s.000000", $zeitstempel);

		if($db->connect_errno)
				{
					echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
					echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
				}
				else
				{
                    $stmt = $db->prepare("SELECT datetime,Regen FROM wetterdaten01 WHERE '$old_time' order by wetterdaten01.datetime DESC,wetterdaten01.regen DESC LIMIT 1");
                    $stmt->execute();
                    $result = $stmt->get_result();
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $r = $row["Regen"];
                            }
                        }
                    $abfrage2 = $db->prepare("SELECT datetime,Regen FROM wetterdaten01 WHERE '$actual_time' order by wetterdaten01.datetime DESC LIMIT 20");
                    $abfrage2->execute();
                    $result2 = $abfrage2->get_result();
                        if(mysqli_num_rows($result2)> 0){
                            while($row1 = mysqli_fetch_assoc($result2)){
                                $r1 = $row1["Regen"];
                            }
                        }
                        if($r1 != $r){
                            $differenz = $r-$r1;
                            echo $differenz/(10)."mm";
                        }
                        if($r == $r1){
                            echo "0mm";
                        }
                    
                }  
                mysqli_close($db);
}
rainfall_actual($db);
?>