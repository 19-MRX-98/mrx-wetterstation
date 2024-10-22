<?php
    $db = connect_to_db($dbsrv, $dbuser, $passwd, $database);
    $module = check_weather_forecast_avail($weatherforecast_module);
    function wettervorhersage($db,$module){
        if($module == 1){
            // Wetterdaten abfragen
            $get_openweather_data = "SELECT 
            DATE(dt_txt) as date,
            MAX(temp_max) as max_temp,
            MIN(temp_min) as min_temp,
            SUM(rain_3h) as total_precipitation
            FROM openweather_forecast
            GROUP BY DATE(dt_txt)
            ORDER BY date";

            $result = $db->query($get_openweather_data);
            $weather_data = array();
            // Resultate in ein Array umwandeln und Kelvin in Grad Celsius umrechnen
            while ($row = $result->fetch_assoc()) {
            $row['max_temp'] = kelvin_to_celsius($row['max_temp']);
            $row['min_temp'] = kelvin_to_celsius($row['min_temp']);
            $weather_data[] = $row;
            }

            // Datenbankverbindung schließen
            $db->close();
            // JSON-Daten zurückgeben
            echo "<script>var weatherData = " . json_encode($weather_data) . ";</script>";
        }
        else{
            echo "Das Modul der Wettervorhersage ist nicht aktiviert. Bitte in der Dokumentation nachlesen";
            logs("Modul Wettervorhersage => Status: OFF","ERROR");
        }
    }
    wettervorhersage($db,$module);

?>
<script>
    var weatherData = weatherData || [];

    var labels = [];
    var maxTemps = [];
    var minTemps = [];
    var precipitation = [];

    weatherData.forEach(function(day) {
        labels.push(day.date);
        maxTemps.push(day.max_temp);
        minTemps.push(day.min_temp);
        precipitation.push(day.total_precipitation);
    });

    var ctx = document.getElementById('weatherChart').getContext('2d');
    var weatherChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Max Temperatur (°C)',
                    data: maxTemps,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    yAxisID: 'y',
                    type: 'line'
                },
                {
                    label: 'Min Temperatur (°C)',
                    data: minTemps,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    yAxisID: 'y',
                    type: 'line'
                },
                {
                    label: 'Niederschlag (mm)',
                    data: precipitation,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    yAxisID: 'y1',
                    type: 'bar'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Temperatur (°C)'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)'
                    }
                },
                y1: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Niederschlag (mm)'
                    },
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.8)'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'rgba(255, 255, 255, 0.8)'
                    }
                }
            }
        },
        plugins: [{
            id: 'customCanvasBackgroundColor',
            beforeDraw: (chart) => {
                const ctx = chart.canvas.getContext('2d');
                ctx.save();
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fillStyle = 'rgba(0, 0, 0, 0.8)';
                ctx.fillRect(0, 0, chart.width, chart.height);
                ctx.restore();
            }
        }]
    });
</script>