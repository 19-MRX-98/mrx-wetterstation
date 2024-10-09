<?php
    require_once("php/globals/global_functions.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/sidebar.css">
        <script src="chartjs_4.4/dist/chart.umd.js"></script>
        <script src="js/bootstrap.bundle.min.js" async></script>
        <script src="js/sidebar.js" async></script>
        <script src="js/colormode.js" async></script>
        <script src="js/darkmode.js" async></script>
        <title>Cloudpanel</title>   
    </head>
    <body>
        <?php include("html/nav.php") ?>
        
        <div class="container-fluit bg-body-tertiary rounded-3">
            <div class="row align-items-start">
                <div class="col-3 p-3 mb-2">
                    <h1>Container</h1>
                    <?php include("php/functions/show_containerstatus.php") ?>
                    
                </div>
                <div class="col-sm-9 p-3">
                    <h1>Systemmetriken</h1>
                    <?php include("html/charts/system-properties.html")?>
                    <?php include("php/module/read_logfile.php") ?>
                </div>
            </div>
        </div>
    </body>
<html>