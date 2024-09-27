<?php
	$ini = parse_ini_file("config/cloudpanel.ini");
	
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
		$non_editable_sections = [""];
		logs("non_editable_sections_comserver =>{Reading non Editable Sections from .ini}","INFO");
		return $non_editable_sections;
		
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
?>