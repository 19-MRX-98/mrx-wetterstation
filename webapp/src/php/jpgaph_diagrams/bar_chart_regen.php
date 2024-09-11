<?php

error_reporting(0);
require_once('src/conf/config.inc.php');
require_once ('src/jpgraph-4.4.2/src/jpgraph.php');
require_once ('src/jpgraph-4.4.2/src/jpgraph_bar.php');
require_once ('src/jpgraph-4.4.2/src/jpgraph_date.php');
 $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);

    // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    else{
        $sql = "SELECT DATETIME, Regen FROM wetterdaten01 WHERE date(datetime) = CURDATE() ";
            $result = $conn->query($sql);

            // Arrays für X- und Y-Achse erstellen
            $xValues = array();
            $yValues = array();

            // Daten aus der Abfrage in Arrays speichern
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Datetime in Timestamp umwandeln
                    $timestamp = strtotime($row['DATETIME']);

                    // Werte den Arrays hinzufügen
                    $xValues[] = $timestamp;
                    $yValues[] = round($row['Regen'],2);
                }
            }

            // Verbindung schließen
            $conn->close();

            // Ein Balkendiagramm erstellen
            $graph = new Graph(800, 600);
            $graph->SetScale("datlin");
            // Balken erstellen
            $barplot = new BarPlot($yValues, $xValues);
            $graph->Add($barplot);

            // X-Achse konfigurieren
            $graph->xaxis->SetLabelAngle(90);
            $graph->xaxis->title->Set('Time');
            $graph->ygrid->SetFill(false);
            // Y-Achse konfigurieren
            $graph->yaxis->title->Set('Precipitation');
            $barplot->SetFillColor("#cc1111");
            // Diagramm anzeigen
            $graph->Stroke("src/php/jpgaph_diagrams/jpg/regen_barchart.jpg");
    }

?>