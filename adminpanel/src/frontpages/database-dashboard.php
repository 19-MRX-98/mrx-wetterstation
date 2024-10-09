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
        <script src="js/bootstrap.bundle.min.js" async></script>
        <script src="js/sidebar.js" async></script>
        <script src="js/colormode.js" async></script>
        <script src="js/darkmode.js" async></script>
        <script src="chartjs_4.4/dist/chart.umd.js"></script>
        <title>Datenbanken</title>   
    </head>
    <body>
        <?php include("html/nav.php") ?>
        <div class="container-fluid bg-body-tertiary rounded-3">
            <div class="d-flex">
                <div class="p-2 flex-fill">
                    <div class='p-3 mb-2 bg-secondary-subtle text-secondary-emphasis'><h3>Datenbankserver</h3></div>
                    <?php include ("php/module/dbsrv_status.php"); ?>
                </div>
                <div class="p-2 flex-fill">
                    <div class='p-3 mb-2 bg-secondary-subtle text-secondary-emphasis'><h3>Update</h3></div>
                    <?php ?>
                </div>
                <div class="p-2 flex-fill">
                    <div class='p-3 mb-2 bg-secondary-subtle text-secondary-emphasis'><h3>Datenbanktabellen</h3></div>
                    <?php include ("php/module/show_tbl_status.php"); ?>
                </div>
            </div>
        </div>
    </body>
<html>