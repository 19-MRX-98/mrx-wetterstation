<?php

$ini = parse_ini_file("/var/www/html/src/conf/webapp.ini");
$global_func=$ini['global_function_file'];

require_once("$global_func");
require_once('src/php/modules/dewpoint.php');
require_once('src/php/modules/airpressure.php');
//require_once("src/php/modules/functions/func_trends.php");


		$db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
		if($db->connect_errno)
				{
					echo "";
					echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
				}
				else
				{
					$get_weatherdata = "SELECT * FROM wetterdaten01 ORDER BY datetime DESC LIMIT 1";
					$actual_weather = $db->query($get_weatherdata);
					while($data = $actual_weather->fetch_array())
						{

							$gerechnete_temperatur=$data[1]/$ini['umrechnung_temp'];
							$gerechnete_windgeschwindigkeit=$data[3]/$ini['umrechnung_wind1'] * $ini['umrechnung_wind2'];
							$gerechnete_windboen=$data[4];
							$niederschlag=$data[5]/$ini['umrechnung_niederschlag'] - $ini['niederschlagsdifferenz'];
						echo"
								<div class='col-sm-6'>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Temperatur</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-temperature-48.png'></img>$gerechnete_temperatur °C</p>
										</div>
									</div>
								</div>

								<div class='col-sm-6'>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Luftfeuchtigkeit</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-humidity-64.png'>$data[2]%</p>
										</div>
									</div>
								</div>

								<div class='col-sm-6'>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Taupunkt</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-dew-point-64.png'></img> ". round($taupunkt,0) ." °C</p>
										</div>
									</div>
								</div>

								<div class='col-sm-6'>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Luftdruck</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-pressure-40.png'></img>".round($airpressure_act, 2)." hPA</p>
										</div>
									</div>
								</div>

								<div class='col-sm-6'>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Wind</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-wind-48_2.png'>$gerechnete_windgeschwindigkeit km/h</p>
										</div>
									</div>
								</div>

								<div class='col-sm-6 '>
									<div class='card text-center'>
										<div class='card-body'>
											<h5 class='card-title'>Windböen</h5><hr>
											<p class='card-text'><img src = 'src/pictures/icons8/icons8-wind-48.png'>$gerechnete_windboen km/h</p>
										</div>
									</div>
								</div>
						";
						}
					mysqli_close($db);
				}

		?>