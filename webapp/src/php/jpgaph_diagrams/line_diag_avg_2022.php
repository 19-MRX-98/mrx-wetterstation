<?php
    error_reporting(1);
    require_once('src/conf/config.inc.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph_line.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph_date.php');
    require_once ('src/jpgraph-4.4.2/src/jpgraph_ttf.inc.php');


    
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $conn = new mysqli($dbsrv,$dbuser,$passwd,$database);
        // Datenbankabfrage für Linie 1
        $get_avg_per_month = "SELECT MONTH(datetime) AS month, AVG(temperatur)/10 AS avg_temp FROM wetterdaten2022 GROUP BY MONTH(datetime)";
        $result_line1 = $conn->query($get_avg_per_month);

        // Datenbankabfrage für Linie 2
        $get_avg_long_term = "SELECT March, April, May, June, July, August, September, October, November, December FROM jahresmittel_1991_2020 WHERE selected = '1'";
        $result_line2 = $conn->query($get_avg_long_term);

        // Daten für Linie 1 vorbereiten
        $data_line1 = array();
        while ($row = $result_line1->fetch_assoc()) {
            $data_line1[] = $row['avg_temp'];
        }

        // Daten für Linie 2 vorbereiten
        $data_line2 = array();
        $row_line2 = $result_line2->fetch_assoc();
        foreach ($row_line2 as $value) {
            $data_line2[] = $value;
        }


        $data_line1=array_map('intval', $data_line1);
        $data_line2=array_map('intval', $data_line2);
        // Monatsnamen für die x-Achse
        $months = array('Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

        // Diagramm erstellen
        $graph = new Graph(1200, 800);
        $graph->SetScale('textlin');

        // Linie 1 hinzufügen
        $line1 = new LinePlot($data_line1);
        $line1->SetColor('blue');
        $line1->SetLegend('2022');

        // Linie 2 hinzufügen
        $line2 = new LinePlot($data_line2);
        $line2->SetColor('red');
        $line2->SetLegend('Langjähriges Mittel');

        // Diagramm konfigurieren
        $graph->title->Set("Temperaturvergleich");
        $graph->xaxis->SetTickLabels($months);
        $graph->xaxis->SetTitle("Monat");
        $graph->yaxis->SetTitle("Temperatur (°C)");

        $line1->mark->SetType(MARK_FILLEDCIRCLE);
        $line1->mark->SetFillColor("red");
        $line1->mark->SetWidth(4);

        $line2->mark->SetType(MARK_FILLEDCIRCLE);
        $line2->mark->SetFillColor("blue");
        $line2->mark->SetWidth(4);

        // Legende hinzufügen
        $graph->legend->SetPos(0.1, 0.1);

        // Linien dem Diagramm hinzufügen
        $graph->Add($line1);
        $graph->Add($line2);

        $graph->Stroke("src/php/jpgaph_diagrams/jpg/avg_chart_2022.jpg");
?>