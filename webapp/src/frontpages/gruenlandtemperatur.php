<?php
    require_once("/var/www/html/src/php/globals/global_functions.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/src/css/pfeil.css">
        <script src="/src/js/bootstrap.bundle.min.js" async></script>
        <title>
                <?php echo $wsname;?>
        </title><!--Put your Weatherstation's Name in the Configurations PHP-->
        <?php include("src/html/header.php");?>
    </head>
    <body>
        <center><h1><span class="badge bg-dark"></span>Grünlandtemperatursumme <?php echo date("Y"); ?></h1></center>

        <div class="card">
            <div class="card-body">
            <img src = "/src/pictures/icons8/icons8-info-64.png"></img>
                <p>
                    Die Grünlandtemperatursumme (GTS) ist eine Spezialform der Wachstumsgradtage, die in der Agrarmeteorologie verwendet wird. Sie wird herangezogen, um in Mitteleuropa den Termin für das Einsetzen der Feldarbeit nach dem Winter zu bestimmen.<br>
                    Eine Wärmesumme ist allgemein eine gewisse Lufttemperatur eines Tages über die Tage einer Periode summiert. Dabei verwendet man besonders die kumulierte korrigierte GTS, die nach Monat gewichtet wird: <br>Es werden ab Jahresbeginn alle positiven Tagesmittel erfasst. Im Januar wird mit dem Faktor 0.5 multipliziert, im Februar mit dem Faktor 0.75, und ab März geht dann der "volle" Tageswert (mal Faktor 1) in die Rechnung ein.
                    Wird im Frühjahr die Summe von 200 überschritten, ist der nachhaltige Vegetationsbeginn erreicht. Hintergrund ist die Stickstoffaufnahme und -verarbeitung des Bodens, welcher von dieser Temperatursumme abhängig ist. In mittleren Breiten wird das meist im Laufe des März, an der Wende von Vorfrühling zu Mittfrühling erreicht.
                </p>
            </div>
        </div>
        <?php include("src/php/modules/functions/func_gruenland_temp.php"); ?>
    </body>
</html>