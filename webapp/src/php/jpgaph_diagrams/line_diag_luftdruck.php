<?php
    error_reporting(0);
    require_once('src/conf/config.inc.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph_line.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph_date.php');
     $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);

        // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
        else{

           // Datenbankabfrage für Linie 1: Monatsmittel des aktuellen Jahres
            $query1 = "SELECT MONTHNAME(datetime) AS month, AVG(temperatur)/10 AS avg_temp FROM wetterdaten01 WHERE YEAR(datetime) = YEAR(CURDATE()) GROUP BY MONTH(datetime)";
            $result1 = $conn->query($query1);

            // Datenbankabfrage für Linie 2: Monatsmittel aus dem langjährigen Mittel
            $query2 = "SELECT Jan, Feb, Mrz, Apr, Mai, Jun, Jul, Aug, Sep, Okt, Nov, Dez FROM jahresmittel_1991_2020 where selected = 1";
            $result2 = $conn->query($query2);
            $data2 = $result2->fetch_assoc(); // Da es nur eine Zeile gibt, können wir fetch_assoc verwenden

            // Daten für Linie 1 vorbereiten
            $dataPoints1 = array();
            while ($row = $result1->fetch_assoc()) {
                $dataPoints1[] = array("label" => $row['month'], "y" => $row['avg_temp']);
            }

            // Daten für Linie 2 vorbereiten
            $dataPoints2 = array();
            foreach ($data2 as $month => $avg_temp) {
                $dataPoints2[] = array("label" => $month, "y" => $avg_temp);
            }

            // JPGraph-Bibliothek einbinden
            require_once ('jpgraph/jpgraph.php');
            require_once ('jpgraph/jpgraph_line.php');

            // Neues Graph-Objekt erstellen
            $graph = new Graph(600, 400);
            $graph->SetScale("textlin");

            // Linie 1 hinzufügen
            $line1 = new LinePlot($dataPoints1);
            $line1->SetLegend("Aktuelles Jahr");
            $line1->mark->SetType(MARK_SQUARE);
            $line1->SetColor("blue");

            // Linie 2 hinzufügen
            $line2 = new LinePlot($dataPoints2);
            $line2->SetLegend("Langjähriges Mittel");
            $line2->mark->SetType(MARK_CIRCLE);
            $line2->SetColor("green");

            // Graph mit Linien zeichnen
            $graph->Add($line1);
            $graph->Add($line2);

            // Achsenbeschriftungen und Legende hinzufügen
            $graph->xaxis->SetTitle("Monat");
            $graph->yaxis->SetTitle("Temperatur");
            $graph->legend->SetPos(0.5, 0.95, "center", "bottom");
            // Diagramm anzeigen
            $graph->Stroke("src/php/jpgaph_diagrams/jpg/airpressure_chart24h.jpg");

        }
?>