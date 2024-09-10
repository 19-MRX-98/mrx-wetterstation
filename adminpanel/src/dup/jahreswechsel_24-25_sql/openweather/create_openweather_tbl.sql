CREATE TABLE openweather_forecast (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt INT,
    temp FLOAT,
    feels_like FLOAT,
    temp_min FLOAT,
    temp_max FLOAT,
    pressure INT,
    humidity INT,
    weather_main VARCHAR(50),
    weather_description VARCHAR(255),
    clouds INT,
    wind_speed FLOAT,
    wind_deg INT,
    visibility INT,
    pop FLOAT,
    rain_3h FLOAT,
    dt_txt DATETIME
);