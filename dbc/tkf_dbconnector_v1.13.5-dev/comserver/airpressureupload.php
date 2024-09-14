<?php
	$ini=parse_ini_file("/tkf_com/conf/comserver.ini");
	$scriptname=$_SERVER['SCRIPT_NAME'];
	require_once('tinkerforge_scripts/IPConnection.php');
	require_once('tinkerforge_scripts/BrickletBarometerV2.php');

	$host = $ini['gw_address'];
	$port = $ini['gw_port'];
	$uid = $ini['airpressure_bricklet_uuid'];

	define("HOST",$host);
	define("PORT",$port);
	define("UID",$uid);

	use Tinkerforge\IPConnection;
	use Tinkerforge\BrickletBarometerV2;


	// Callback function for air pressure callback
	function cb_airPressure($air_pressure,$scriptname)
	{
		require_once("/tkf_com/global_functions/global_functions.php");
		//Variablen 
		date_default_timezone_set("Europe/Berlin");
		$date = date("Y-m-d H:i:s");

		$data_reg = new mysqli($dbsrv,$dbuser,$passwd,$database);
		if($data_reg->connect_errno)
					{
						echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
						echo "Fehler".$data_reg->connect_errno.":".$data_reg->connect_errno; 
						logs("$scriptname => AIRPRESSURE_DATA_IMPORT_FATAL_ERROR | RAWDATA => Fehler.$data_reg->connect_errno ->connect_errno; ","FATAL");
						exit;
					}
					else{
									//echo "Datenbankverbindung hergestellt!";
									$data = "INSERT INTO $ini[airpressure_tbl] (datetime, airpressure) VALUES ('$date', '$air_pressure')";
									$eintrag = $data_reg->query($data);
									logs("$scriptname => AIRPRESSURE_DATA_IMPORT | RAWDATA => {| $date |$air_pressure |}","INFO");
						}
					mysqli_close($data_reg);
	}

	$ipcon = new IPConnection(); // Create IP connection
	$b = new BrickletBarometerV2(UID, $ipcon); // Create device object

	$ipcon->connect(HOST, PORT); // Connect to brickd
	// Don't use device before ipcon is connected

	// Register air pressure callback to function cb_airPressure
	$b->registerCallback(BrickletBarometerV2::CALLBACK_AIR_PRESSURE, 'cb_airPressure');

	// Set period for air pressure callback to 1s (1000ms) without a threshold
	$b->setAirPressureCallbackConfiguration(1000, FALSE, 'x', 0, 0);

	echo "Press ctrl+c to exit\n";
	$ipcon->dispatchCallbacks(-1); // Dispatch callbacks forever

?>