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

            $get_temp = "SELECT DATETIME,feuchte as temp FROM wetterdaten01 WHERE date(datetime) = CURDATE() ";

            $result = $conn->query($get_temp);

            // Arrays für die Daten erstellen
            $feuchte = array();
            $zeit = array();
            
            // Daten aus dem Abfrageergebnis extrahieren
            while ($row = $result->fetch_assoc()) {
                $feuchte[] = $row['temp'];
                $zeit[] = strtotime($row['DATETIME']);
            }
            mysqli_close($conn);
            // JpGraph-Objekte erstellen
            $graph = new Graph(1200,800);
            $graph->SetScale('datlin',0,100);
            $graph->xaxis->scale->SetDateFormat( 'H:i' );
            $graph->SetTickDensity( TICKD_DENSE );
            // Linienplot erstellen
            $lineplot = new LinePlot($feuchte,$zeit);
            $lineplot->SetFillColor("blue@0.5");
            $graph->Add($lineplot);
            
            // Achsentitel festlegen
            $graph->xaxis->title->Set('Zeit');
            $graph->xaxis->SetLabelAngle(90);
            $graph->yaxis->title->Set('Luftfeuchtigkeit in %');

            $graph->img->SetAntiAliasing();
            $graph->legend->SetFrameWeight(1);
            // Diagramm anzeigen
            $graph->Stroke("src/php/jpgaph_diagrams/jpg/feuchte_chart24h.jpg");

        }
?>