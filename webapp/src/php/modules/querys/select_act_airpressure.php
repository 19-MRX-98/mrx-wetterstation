<?php
    $conn = new mysqli($dbsrv,$dbuser,$passwd,$database); //Create Database Co0nnection
    $sql1 = "SELECT airpressure FROM $database.airpressure ORDER BY datetime DESC LIMIT 1";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pressure = $row["airpressure"]/$ini["umrechnung_luftdruck"];;     
        }
    } 
    else {
        echo "0 results";
    }
    $conn->close();

?>