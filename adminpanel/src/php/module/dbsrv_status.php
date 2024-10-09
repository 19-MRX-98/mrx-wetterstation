<?php
    // Verbindung zur Datenbank herstellen
    $host = $ini['db_host'];
    $db = $ini['database'];

    $pdo = new PDO("mysql:host=$host;dbname=$db", $ini['db_username'], $ini['db_password']);

    // Abfrage 1: MySQL-Serverversion abfragen
    $server_version = $pdo->query('SELECT VERSION()')->fetchColumn();
    echo "<div class='bg-success p-2 text-white bg-opacity-75' style='margin-bottom:1%'</style>MySQL Server Version: " . $server_version . "<br></div>";

    // Abfrage 2: Laufende Datenbankprozesse anzeigen
    $processes = $pdo->query('SHOW PROCESSLIST')->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='p-3 mb-2 bg-secondary-subtle text-secondary-emphasis'>Laufende Prozesse:</div><br>";
    foreach ($processes as $process) {
        echo "<div class='bg-success p-2 text-white bg-opacity-75' style='margin-top:-2%;margin-bottom:1%'</style> ID: " . $process['Id'] . " - User: " . $process['User'] . " - Host: " . $process['Host'] . " - Status: " . $process['State'] . "<br></div>";
    }

    // Abfrage 3: Informationen über Datenbanken abrufen
    $databases = $pdo->query('SHOW DATABASES')->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='p-3 mb-2 bg-secondary-subtle text-secondary-emphasis'>Verfügbare Datenbanken:<br></div>";
    foreach ($databases as $db) {
        echo "<div class='bg-success p-2 text-white bg-opacity-75' style='margin-top:1%'</style>".$db['Database'] . "<br></div>";
    }
?>