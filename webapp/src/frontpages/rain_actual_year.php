<?php
$ini = parse_ini_file("/var/www/html/src/conf/webapp.ini");
     require 'src/php/analog/lib/Analog.php';
     require_once("/var/www/html/src/conf/config.inc.php");
     require_once("src/php/modules/log_modules/log_http_client_info.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css">
        <script src="/src/js/bootstrap.bundle.min.js" async></script>
        <title>
                <?php echo $wsname;?>
        </title><!--Put your Weatherstation's Name in the Configurations PHP-->
        <?php include("src/html/header.php");?>
    </head>
    <body>
        <center><h1><span class="badge bg-dark"></span>Niederschlag <?php echo date("Y"); ?></h1></center>
        <?php 
            $act_year =date("Y");
            include("src/php/modules/regen/$act_year/rain_per_month.php"); 
        ?>
    </body>
</html>