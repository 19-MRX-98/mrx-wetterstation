<?php

$db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
		if($db->connect_errno)
				{
					echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
					echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
				}
				else
				{
					$get_weatherdata = "SELECT Wind FROM wetterdaten01 ORDER BY datetime DESC LIMIT 1";
					$actual_weather = $db->query($get_weatherdata);
					while($data = $actual_weather->fetch_array())
						{
							if($data[0] === "0")
							{
							echo "<img src = 'src/pictures/icons8/icons8-north-52.png'></img>".$ini['WIND_DIRECTION_N'];
							}
						
							elseif($data[0] === "1")
							{
								echo "<img src = 'src/pictures/icons8/icons8-north-east-48.png'></img>".$ini['WIND_DIRECTION_NNE'];
							}
							elseif($data[0] === "2")
							{
								echo "<img src = 'src/pictures/icons8/icons8-north-east-48.png'></img>".$ini['WIND_DIRECTION_NE'];
							}
							elseif($data[0] === "3")
							{
								echo "<img src = 'src/pictures/icons8/icons8-east-north-east-50.png'></img>".$ini['WIND_DIRECTION_ENE'];
							}
							elseif($data[0] === "4")
							{
								echo "<img src = 'src/pictures/icons8/icons8-east-50.png'></img>".$ini['WIND_DIRECTION_E'];
							}
							elseif($data[0] === "5")
							{
								echo "<img src = 'src/pictures/icons8/icons8-east-south-east-50.png'></img>".$ini['WIND_DIRECTION_ESE'];
							}
							elseif($data[0] === "0")
							{
								echo "<img src = 'src/pictures/icons8/icons8-south-east-64.png'></img>".$ini['WIND_DIRECTION_SE'];
							}
							elseif($data[0] === "7")
							{
								echo "<img src = 'src/pictures/icons8/icons8-south-south-east-64.png'></img>".$ini['WIND_DIRECTION_SSE'];
							}
							elseif($data[0] === "8")
							{
								echo "<img src = 'src/pictures/icons8/icons8-south-64.png'></img>".$ini['WIND_DIRECTION_S'];
							}
							elseif($data[0] === "9")
							{
								echo "<img src = 'src/pictures/icons8/icons8-south-south-west-64.png'></img>".$ini['WIND_DIRECTION_SSW'];
							}
							elseif($data[0] === "10")
							{
								echo "<img src = 'src/pictures/icons8/icons8-south-west-50.png'></img>".$ini['WIND_DIRECTION_SW'];
							}
							elseif($data[0] === "11")
							{
								echo "<img src = 'src/pictures/icons8/icons8-west-south-west-50.png'></img>".$ini['WIND_DIRECTION_WSW'];
							}
							elseif($data[0] === "12")
							{
								echo "<img src = 'src/pictures/icons8/icons8-west-50.png'></img>".$ini['WIND_DIRECTION_W'];
							}
							elseif($data[0] === "13")
							{
								echo "<img src = 'src/pictures/icons8/icons8-west-north-west-50.png'></img>".$ini['WIND_DIRECTION_WNW'];
							}
							elseif($data[0] === "14")
							{
								echo "<img src = 'src/pictures/icons8/icons8-north-west-50.png'></img>".$ini['WIND_DIRECTION_NW'];
							}
							elseif($data[0] === "15")
							{
								echo "<img src = 'src/pictures/icons8/icons8-east-north-east-50.png'></img>".$ini['WIND_DIRECTION_NNE'];
							}
						}
				}
				mysqli_close($db);
?>