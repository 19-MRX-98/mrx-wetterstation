<?php
$ini=parse_ini_file("/tkf_com/conf/comserver.ini");
require_once("/tkf_com/global_functions/global_functions.php");

require_once('Tinkerforge/IPConnection.php');
require_once('Tinkerforge/BrickletUVLightV2.php');

use Tinkerforge\IPConnection;
use Tinkerforge\BrickletUVLightV2;

$host = $ini['gw_address'];
$port = $ini['gw_port'];
$uid = $ini['uv_bricklet_uuid'];

define("HOST",$host);
define("PORT",$port);
define("UID",$uid);

$ipcon = new IPConnection(); // Create IP connection
$uvl = new BrickletUVLightV2(UID, $ipcon); // Create device object

$ipcon->connect(HOST, PORT); // Connect to brickd
// Don't use device before ipcon is connected

// Get current UV-A
$uva = $uvl->getUVA();
//echo "UV-A: " . $uva/10.0 . " mW/m²\n";

// Get current UV-B
$uvb = $uvl->getUVB();
//echo "UV-B: " . $uvb/10.0 . " mW/m²\n";

// Get current UV index
$uvi = $uvl->getUVI();
//echo "UV Index: " . $uvi/10.0 . "\n";

date_default_timezone_set("Europe/Berlin");
	$date = date("Y-m-d H:i:s");
	//$uniqid = uniqid();
	//Datenbankverbindung + Aufruf + Datenimport
	$data_reg = new mysqli($dbsrv,$dbuser,$passwd,$database);
	if($data_reg->connect_errno)
				{
					echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
					echo "Fehler".$data_reg->connect_errno.":".$data_reg->connect_errno; 
					exit;
				}
				else{
                                $i = rand();
								echo "Datenbankverbindung hergestellt!";
								$data = "INSERT INTO $ini[uv_tbl] (ID, UVA, UVB, UVI) VALUES ($i,$uva,$uvb,$uvi)";
								$eintrag = $data_reg->query($data);
								echo $i."<br>";
								echo $uva."<br>";
								echo $uvb."<br>";
								echo $uvi."<br>";
					}
				mysqli_close($data_reg);

				echo "Press key to exit\n";
				fgetc(fopen('php://stdin', 'r'));
				$ipcon->disconnect();
				
?>