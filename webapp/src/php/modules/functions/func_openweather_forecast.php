<?php
    require_once("src/php/globals/global_functions.php");
    $get_data = connect_to_db($dbsrv, $dbuser, $passwd, $database);
        
    $get_openweather_data = "SELECT * FROM openweather_forecast";
    $result = $get_data->query($get_openweather_data);
    
    function fetch_data($result){
        if ($result->num_rows > 0) {
            // Daten ausgeben
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>DateTime</th>
                        <th>Temp</th>
                        <th>Feels Like</th>
                        <th>Temp Min</th>
                        <th>Temp Max</th>
                        <th>Pressure</th>
                        <th>Humidity</th>
                        <th>Weather Main</th>
                        <th>Weather Description</th>
                        <th>Clouds</th>
                        <th>Wind Speed</th>
                        <th>Wind Deg</th>
                        <th>Visibility</th>
                        <th>Pop</th>
                        <th>Rain (3h)</th>
                    </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["dt_txt"] . "</td>
                        <td>" . $row["temp"] . "</td>
                        <td>" . $row["feels_like"] . "</td>
                        <td>" . $row["temp_min"] . "</td>
                        <td>" . $row["temp_max"] . "</td>
                        <td>" . $row["pressure"] . "</td>
                        <td>" . $row["humidity"] . "</td>
                        <td>" . $row["weather_main"] . "</td>
                        <td>" . $row["weather_description"] . "</td>
                        <td>" . $row["clouds"] . "</td>
                        <td>" . $row["wind_speed"] . "</td>
                        <td>" . $row["wind_deg"] . "</td>
                        <td>" . $row["visibility"] . "</td>
                        <td>" . $row["pop"] . "</td>
                        <td>" . $row["rain_3h"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    fetch_data($result);

    
?>