<?php
	$ini = parse_ini_file("config/cloudpanel.ini");
	$releases = parse_ini_file("config/releases.ini");
	
	require_once("constants.php");
	require_once("analog/lib/Analog.php");
	date_default_timezone_set('Europe/Berlin');


	$database = $ini["database"];
	$tkf_adm= "tkf_admin";
	$dbsrv = $ini["db_host"];
	$dbuser= $ini["db_username"];
	$dbport= $ini["db_port"];
	$passwd = $ini["db_password"];
	$message='';
	$logfile = $ini["log_path"];
	$connector_logfile="/projects/TinkerforgeWetterstation/tkf_com/tkf_dbconnector_v1.12.7.1-dev/comserver/logs/dbc_log.log";
	$releasefile = $ini['releasefile'];
	$download_url = $ini['github_download'];


	//Creates Database Connection
	function connect_to_db($dbsrv, $dbuser, $passwd, $database) {
		$db = new mysqli($dbsrv, $dbuser, $passwd, $database);
		if ($db->connect_errno) {
			echo "Fehler " . $db->connect_errno . ": " . $db->connect_errno;
			logs("function connect_to_db =>{Connection Error " . $db->connect_errno . "}","ERROR");
			exit;
		} else {
			logs("function connect_to_db =>{Connection to Database successfull}","INFO");
			return $db;
		}
		
	}
	connect_to_db($dbsrv, $dbuser, $passwd, $database);

	function logs($message,$error_level = 'INFO'){
		$logfile = "/var/www/html/logs/app.log";
		$date_time = date("Y-m-d H:i:s");
		$formatted_message = "[$date_time]-->[$error_level]-->[$message]\n";
		file_put_contents($logfile, $formatted_message, FILE_APPEND);

	}
	logs($message);

	function generateSoftwareUID() {
        // Beispiel zur Generierung einer eindeutigen Software UID
        $unique_string = php_uname() . gethostbyname(gethostname()) . time();
        $uuid = md5($unique_string);
        return $uuid;
    }

	function non_editable_keys_comserver(){
		$non_editable_keys = [
			"version", "release", "stage", "log_file", "db", "weatherdata_tbl", 
			"airpressure_tbl", "uv_tbl", "max_temp_tbl", "openweather_tbl,","cloud_weatherdata_tbl",
			"cloud_airpressure_tbl", "cloud_uv_tbl", "cloud_max_temp_tbl", "cloud_openweather_tbl"
			,"docker_registry","downloadserver","downloaduser","downloadpass","downloadPATH","downloadFILE"
		];
		logs("function non_editable_keys_comserver =>{Reading non Editable Keys from .ini}","INFO");
		return $non_editable_keys;
		
	}

	function non_editable_sections_comserver(){
		$non_editable_sections = ["Updates","PHP_Constants"];
		logs("non_editable_sections_comserver =>{Reading non Editable Sections from .ini}","INFO");
		return $non_editable_sections;
		
	}

	function non_editable_sections_webapp(){
		$non_editable_sections = ["Updates","PHP_Constants","Global_Config","PHP","PHP_Script_Files","CSS/HTML","Javascripts","JPGRAPH"];
		logs("non_editable_sections_webapp =>{Reading non Editable Sections from .ini}","INFO");
		return $non_editable_sections;
		
	}

	function non_editable_keys_webapp(){
		$non_editable_keys = [
			"version", "release", "stage", "log_file", "db", "weatherdata_tbl", 
			"airpressure_tbl", "uv_tbl", "max_temp_tbl", "openweather_tbl,","cloud_weatherdata_tbl",
			"cloud_airpressure_tbl", "cloud_uv_tbl", "cloud_max_temp_tbl", "cloud_openweather_tbl"
			,"docker_registry","downloadserver","downloaduser","downloadpass","downloadPATH","downloadFILE","openweather_tbl"
		];
		logs("function non_editable_keys_webapp =>{Reading non Editable Keys from .ini}","INFO");
		return $non_editable_keys;
		
	}

	function non_editable_keys_cloudpanel(){
		$non_editable_keys = [
			"version", "release", "stage", "log_path", "mode", "env_path", 
			"compose_path", "logger", "logger_version", "logger_integration","config_path",
			"apache_config_path", "cloud_uv_tbl", "cloud_max_temp_tbl", "cloud_openweather_tbl",
			"docker_registry","downloadserver"
		];
		logs("function non_editable_keys_cloudpanel =>{Reading non Editable Keys from .ini}","INFO");
		return $non_editable_keys;
		
	}

	function non_editable_sections_cloudpanel(){
		$non_editable_sections = ["Updates"];
		logs("function non_editable_sections_cloudpanel =>{Reading non Editable Sections from .ini}","INFO");
		return $non_editable_sections;
		
	}

	function non_editable_keys_dockerENV(){
		$non_editable_keys_dockerENV= [
			"COMPOSE_IGNORE_ORPHANS", "COMPOSE_PROJECT_NAME", "APACHE_DIR",
			"WEATHERAPP_LOG_DIR", "REMOTE_DBC_LOGFILE", "LOCAL_DBC_LOGFILE"
		];
		logs("function non_editable_keys_dockerenv =>{Reading non Editable Keys from .env}","INFO");
		return $non_editable_keys_dockerENV;
		
	}
	function check_for_update($local_file, $remote_file) {
		// Überprüfen, ob beide Dateien existieren
		if (!file_exists($local_file) || !file_exists($remote_file)) {
			return "Eine oder beide Dateien existieren nicht.";
		}
	
		// Inhalt der Dateien einlesen
		$inhaltDatei1 = file_get_contents($local_file);
		$inhaltDatei2 = file_get_contents($remote_file);
	
		// Inhalt vergleichen
		if ($inhaltDatei1 === $inhaltDatei2) {
			return "Keine Updates verfügbar.";
		} else {
			// Unterschied anzeigen
			$unterschiede = [];
			$datei1Zeilen = explode("\n", $inhaltDatei1);
			$datei2Zeilen = explode("\n", $inhaltDatei2);
	
			foreach ($datei1Zeilen as $zeileNummer => $zeile) {
				if (isset($datei2Zeilen[$zeileNummer])) {
					if ($zeile !== $datei2Zeilen[$zeileNummer]) {
						$unterschiede[] = "Unterschied in Zeile " . ($zeileNummer + 1) . ":\nLokal: " . $zeile . "\nRemote: " . $datei2Zeilen[$zeileNummer] . "\n";
					}
				} else {
					$unterschiede[] = "Zeile " . ($zeileNummer + 1) . " existiert in der lokalen Datei, aber nicht in der Remote-Datei: " . $zeile . "\n";
				}
			}
	
			// Zusätzliche Zeilen in der Remote-Datei überprüfen
			if (count($datei2Zeilen) > count($datei1Zeilen)) {
				for ($i = count($datei1Zeilen); $i < count($datei2Zeilen); $i++) {
					$unterschiede[] = "Zeile " . ($i + 1) . " existiert in der Remote-Datei, aber nicht in der lokalen Datei: " . $datei2Zeilen[$i] . "\n";
				}
			}
	
			$diff = implode("\n", $unterschiede);
			return $diff;
		}
	}
	
	// Beispielaufruf mit den gewünschten Variablen
	$local_file = 'config/releases.ini';
	$remote_file = 'config/server-release.ini';
	
	echo check_for_update($local_file, $remote_file);
?>