<?php
date_default_timezone_set("Europe/Berlin");
require_once("/var/www/html/conf/config.inc.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <div class = "cont-header">
        <div class = "cont-header-statistics">
            Erweiterte Wetterdaten/Statistik
            <?php include "/var/www/html/html/navbar.html";?>
    </div>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>MinMax2022</title>
    </head>
    <body id = "body">
        <div>
        <div class = 'Uberschrift-jahreswerte1'>Min/Max per Tag 2022</div>
        <form method='POST' action=''>
                <div class='form-inline'>
                <font color = "white">Anzahl Datensätze</font><select class='form-control' name='amount_datasets'>
						<option selected value='7'>7</option>
						<option value='10'>10</option>
						<option value='25'>25</option>
                        <option value='50'>50</option>
                        <option value='100'>100</option>
                        <option value='200'>200</option>
                        <option value='200'>365</option>
                    </select>
                    <font color = "white">Sortierung</font><select class='form-control' name='sort'>
						<option selected value='ASC'>Aufsteigend</option>
                        <option selected value='DESC'>Absteigend</option>
                    </select>
                    <button class='btn-filter' name='filter'>Filter</button>
                    <button class='btn-reset' name='reset'>Reset</button>
                </div>
</div>
        </form>
            <table>
                <th>Datum</th>
                <th>MaxTemp</th>
                <th>AVG</th>
                <th>MinTemp</th>
                <th>Regen</th>
			</table>
            <?php include("min_max_avg22.php");?>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>