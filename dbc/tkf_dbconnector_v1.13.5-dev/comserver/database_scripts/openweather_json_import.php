<?php
    require_once("/tkf_com/global_functions/global_functions.php");
    

    $scriptname=$_SERVER['SCRIPT_NAME'];

    
    

    date_default_timezone_set("Europe/Berlin");

        $data_reg = connect_to_weatherdb($dbsrv, $dbuser, $passwd, $database);
        $set_nul = "TRUNCATE TABLE $ini[openweather_tbl]";
        
        logs("$scriptname => Tabelle $ini[openweather_tbl] geleert","INFO");
        
        mysqli_multi_query($data_reg, $set_nul);
        $i=1;


        if($i = 1){
            // Abrufen der JSON-Daten von der API
            $api_url = $ini['openweather_api_query_url'];
            $json_data = file_get_contents($api_url);
            
            if ($json_data === false) {
                logs("$scriptname => PHP_OPENWEATHER_JSON_IMPORT Error | ",'ERROR');
            }
            else{
                // JSON-Daten dekodieren
                $data = json_decode($json_data, true);
                    
                // Iteration durch die "list" Einträge und Einfügen in die Datenbank
                foreach ($data['list'] as $forecast) {
                    $dt = $forecast['dt'];
                    $temp = $forecast['main']['temp'];
                    $feels_like = $forecast['main']['feels_like'];
                    $temp_min = $forecast['main']['temp_min'];
                    $temp_max = $forecast['main']['temp_max'];
                    $pressure = $forecast['main']['pressure'];
                    $humidity = $forecast['main']['humidity'];
                    $weather_main = $forecast['weather'][0]['main'];
                    $weather_description = $forecast['weather'][0]['description'];
                    $clouds = $forecast['clouds']['all'];
                    $wind_speed = $forecast['wind']['speed'];
                    $wind_deg = $forecast['wind']['deg'];
                    $visibility = $forecast['visibility'];
                    $pop = $forecast['pop'];
                    $rain_3h = isset($forecast['rain']['3h']) ? $forecast['rain']['3h'] : 0;
                    $dt_txt = $forecast['dt_txt'];

                    // SQL Insert Query
                    $sql = "INSERT INTO $ini[openweather_tbl]
                            (dt, temp, feels_like, temp_min, temp_max, pressure, humidity, weather_main, weather_description, clouds, wind_speed, wind_deg, visibility, pop, rain_3h, dt_txt)
                            VALUES 
                            ('$dt', '$temp', '$feels_like', '$temp_min', '$temp_max', '$pressure', '$humidity', '$weather_main', '$weather_description', '$clouds', '$wind_speed', '$wind_deg', '$visibility', '$pop', '$rain_3h', '$dt_txt')";

                    if ($data_reg->query($sql) === TRUE) {
                        logs("Import von 40 Datensätzen erfolgreich",'INFO');
                    } else {
                        logs("Import von 40 Datensätzen nicht erfolgreich",'ERROR');
                    }
                }
            }

            // Verbindung schließen
            $data_reg->close();
        }

    
?>