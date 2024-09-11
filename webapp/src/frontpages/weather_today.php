<?php
   $ini = parse_ini_file("/var/www/html/src/conf/webapp.ini");
   require 'src/php/analog/lib/Analog.php';
   require_once("/var/www/html/src/conf/config.inc.php");
   require_once("src/php/modules/log_modules/log_http_client_info.php");
   include("src/dashboard/inc/dashboard_dist.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/src/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/src/css/vanilla-datetimerange-picker.css">
        <script src="/src/js/bootstrap.bundle.min.js" async></script>
        <script src="/src/js/dashboard.min.js" async></script>
        <script src="/src/js/jquery-ui.js" async></script>
        <script src="/src/js/jquery.min.js" async></script>
        <script src="/src/js/moment.min.js" async></script>
        <script src="/src/js/html2canvas.min.js" async></script>
        <script src="/src/js/jspdf.min.js" async></script>
        <script src="/src/js/vanilla-datetimerange-picker.js" async></script>
        <title>
                <?php echo $wsname;?>
        </title><!--Put your Weatherstation's Name in the Configurations PHP-->
        <?php include("src/html/header.php");?>
    </head>
    <body>
        <?php include("src/php/jpgaph_diagrams/test.php"); ?>
    </body>
</html>