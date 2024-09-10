<?php
    
    $conn = new mysqli($servername, $username, $password);

    // Überprüfen, ob die Verbindung erfolgreich war
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Überprüfen, ob die Datenbanken existieren
    $database1 = "wetterstation";
    $database2 = "tkf_admin";

    $result1 = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database1'");
    $result2 = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database2'");

    // Wenn Datenbanken nicht existieren, erstellen
    if ($result1->num_rows == 0) {
        $sql1 = "CREATE DATABASE $database1";
        if ($conn->query($sql1) === TRUE) {
            echo "Database $database1 created successfully<br>";
        } else {
            echo "Error creating database: " . $conn->error . "<br>";
        }
    }

    if ($result2->num_rows == 0) {
        $sql2 = "CREATE DATABASE $database2";
        if ($conn->query($sql2) === TRUE) {
            echo "Database $database2 created successfully<br>";
        } else {
            echo "Error creating database: " . $conn->error . "<br>";
        }
    }

    // Weiterleitung zur Startseite, falls Datenbanken existieren
    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
        header("Location: startseite.php");
        exit();
    }

?>