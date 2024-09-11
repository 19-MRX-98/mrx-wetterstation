<?php
	//require_once("/var/www/html/src/conf/config.inc.php");
	//Parst .ini Datei in Variablen
	$ini = parse_ini_file("/var/www/html/src/conf/webapp.ini");
	//Datenbank
	$database = $ini["database"];
	$dbsrv = $ini["db_host"];
	$dbuser= $ini["db_username"];
	$dbport= $ini["db_port"];
	$passwd = $ini["db_password"];
	//globale funktionen
	$global_func=$ini['global_function_file'];
	$header_path=$ini['header_path'];

	//logs
	$log_config_ok=$ini['log_config_ok'];
	$log_http_client_info=$ini['log_http_client_info'];
	$analog_path=$ini['analog_P'];

	//Zambretti
	$zambretti_forecast = $ini['zambretti_forecast'];
	$zambretti_forecast_html_output=$ini['zambretti_forecast_html_output'];
	$zambretti_calculation=$ini['zambretti_calculation'];

	//Wolken/Gewitter
	$cloudbase=$ini['cloudbase'];
	$theta_e_out=$ini['theta_e_out'];

	//Aktuelles Wetter
	$actual_weather=$ini['actual_weather'];
	$wind=$ini['wind'];
	$windchill=$ini['windchill'];
	$perticipation=$ini['perticipation'];

	//Bootstrap
	$bootstrap_min_js=$ini['bootstrap_min_js'];

	//Stats
	$stats_2022=$ini['stats_2022'];
	$stats_2023=$ini['stats_2023'];
	$stats_2024=$ini['stats_2024'];
	$stats_2025=$ini['stats_2025'];

	//Umrechnungen

	$umrechnung_temp=$ini['umrechnung_temp'];
	$umrechnung_niederschlag=$ini['umrechnung_niederschlag'];
	$umrechnung_luftdruck=$ini['umrechnung_luftdruck'];
	// Andere Variablen
	$message=''; //Logfile

	//Creates Database Connection
	function connect_to_db($dbsrv, $dbuser, $passwd, $database) {
		$db = new mysqli($dbsrv, $dbuser, $passwd, $database);
		if ($db->connect_errno) {
			echo "Fehler " . $db->connect_errno . ": " . $db->connect_errno;
			exit;
		} else {
			return $db;
		}
		
	}
	connect_to_db($dbsrv, $dbuser, $passwd, $database);

	function logs($message,$error_level = 'INFO'){
			$logfile = "/var/www/html/src/logs/webapp.log";
			$date_time = date("Y-m-d H:i:s");
			$formatted_message = "[$date_time]-->[$error_level]-->[$message]\n";
			file_put_contents($logfile, $formatted_message, FILE_APPEND);
	}
	logs($message);

	//Calculates Sunrise in dependency of Latitude, Logitude
	function astrodate_sun_up($dbsrv,$dbuser,$passwd,$database){

		//Call Connect to DB
		$db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
		$get_lat_long=$db->query("SELECT Breite,Laenge FROM jahresmittel_1991_2020 WHERE selected = 1");

				while($data_lat_long = $get_lat_long->fetch_array()){
					$laengegrad = floatval($data_lat_long[0]);
					$breitengrad = floatval($data_lat_long[1]);
				}
				mysqli_close($db);
				//52.4077183,-8.0015624
				$tz = new \DateTimeZone('Europe/Berlin');
				$date = date("d.m.Y");
				$sun_info=date_sun_info(strtotime($date),52.4077183,-8.0015624);
				$sonnenaufgang = $sun_info['sunrise'];
				//print_r($sun_info);
				$sunup = date("H:i:s - D.m.Y",$sonnenaufgang);
				return $sunup;
				
			}
			astrodate_sun_up($dbsrv,$dbuser,$passwd,$database);


	//Calculates Sunrise in dependency of Latitude, Logitude

	function astrodate_sun_down($dbsrv,$dbuser,$passwd,$database){

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
	
				$tz = new \DateTimeZone('Europe/Berlin');
				$date = date("d.m.Y");
				$sun_info=date_sun_info(strtotime($date),52.4077183,-8.0015624);
				$sonnenuntergang = $sun_info['sunset'];
				//print_r($sun_info);
				$sundown = date("H:i:s - D.m.Y",$sonnenuntergang);
				return $sundown;
			}
		astrodate_sun_down($dbsrv,$dbuser,$passwd,$database);
?>