<?php
	$ini_array = parse_ini_file("/config/comserver.ini", true, INI_SCANNER_RAW);
/*function download_ini($releasefile,$download_url){
		$download_path = "config/";
		$command = "wget -O " . escapeshellarg($download_path) . " " . escapeshellarg($download_url);
		exec($command, $output, $status);
		// Check if the download was successful
			if ($status === 0) {
				echo "File downloaded successfully!";
			} else {
				echo "File download failed!";
				print_r($output); // Output for debugging
			}
	}
	download_ini($releasefile,$download_url);*/

	function check_for_db_updates($releases,$releasefile){

		$db_release = $releases["db-release"];
		$dbc_release = $releases["dbc-release"];
		$webapp_release= $releases["webapp-release"];

		if($db_release != $releasefile){
			logs("Datenbank auf der aktuellsten Version","INFO");
		}
		else{
			logs("Datenbankupdate verfügbar. Neue Version: rel-23-2024-12-def","DEBUG");
		}
	}
	check_for_db_updates($releases,$releasefile);
?>