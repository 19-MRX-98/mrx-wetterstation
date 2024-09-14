<?php
	$ini=parse_ini_file("/tkf_com/conf/comserver.ini");
	require_once('tinkerforge_scripts/IPConnection.php');
	require_once('tinkerforge_scripts/BrickletOutdoorWeather.php');

	use Tinkerforge\IPConnection;
	use Tinkerforge\BrickletOutdoorWeather;

	$host = $ini['gw_address'];
	$port = $ini['gw_port'];
	$uid = $ini['weather_bricklet_uuid'];

	define("HOST",$host);
	define("PORT",$port);
	define("UID",$uid);

	$scriptname=$_SERVER['SCRIPT_NAME'];

	

	// Callback function for station data callback
	function cb_stationData($identifier, $temperature, $humidity, $wind_speed, $gust_speed,
							$rain, $wind_direction, $battery_low, $scriptname)
	{
		require_once("/tkf_com/global_functions/global_functions.php");
		
		//require_once("/tkf_com/conf/config.inc.php");
		//Variablen 
		date_default_timezone_set("Europe/Berlin");
		$date = date("Y-m-d H:i:s");
		//Datenbankverbindung + Aufruf + Datenimport
		$data_reg = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
		$data = "INSERT INTO $ini[weatherdata_tbl] (datetime, Temperatur, Feuchte, Windgesch, Windboen, Regen, Wind) VALUES ('$date', '$temperature', '$humidity', '$wind_speed', '$gust_speed', '$rain', '$wind_direction')";
		$eintrag = $data_reg->query($data);
		logs("$scriptname => WEATHER_DATA_IMPORT | RAWDATA => {| $date | $temperature | $humidity | $wind_speed | $gust_speed | $rain | $wind_direction |IMPORT SUCCESSFULL|}","INFO");
		$data_reg->close();
	}

	// Callback function for sensor data callback
	function cb_sensorData($identifier, $temperature, $humidity)
	{
		echo "Identifier (Sensor): $identifier\n";
		echo "Temperature (Sensor): " . $temperature/10.0 . " °C\n";
		echo "Humidity (Sensor): $humidity %RH\n";
		echo "\n";
	}

	$ipcon = new IPConnection(); // Create IP connection
	$ow = new BrickletOutdoorWeather(UID, $ipcon); // Create device object

	$ipcon->connect(HOST, PORT); // Connect to brickd
	// Don't use device before ipcon is connected

	// Enable station data callbacks
	$ow->setStationCallbackConfiguration(TRUE);

	// Enable sensor data callbacks
	$ow->setSensorCallbackConfiguration(FALSE);

	// Register station data callback to function cb_stationData
	$ow->registerCallback(BrickletOutdoorWeather::CALLBACK_STATION_DATA, 'cb_stationData');

	// Register sensor data callback to function cb_sensorData
	$ow->registerCallback(BrickletOutdoorWeather::CALLBACK_SENSOR_DATA, 'cb_sensorData');

	echo "Job successfull executed";
	$ipcon->dispatchCallbacks(-1); // Dispatch callbacks forever

?>
