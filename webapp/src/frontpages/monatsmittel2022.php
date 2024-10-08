<?php
    require_once("/var/www/html/src/php/globals/global_functions.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="<?php echo $ini['data-bs-theme']; ?>">
    <head>
        <meta charset="<?php echo $ini['charset']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo $ini['bootstrap_min_path']; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $ini['bootstrap_main_path']; ?>">
        <script src="<?php echo $bootstrap_min_js ?>" async></script>
		<script src="<?php echo $ini['newrelic_cookie']; ?>" async></script>
        <title>
                <?php echo $ini["wsname"];?>
        </title><!--Put your Weatherstation's Name in the Configurations PHP-->
        <?php include("$header_path");?>
    </head>
    <body>
        <center><h1><span class="badge bg-dark"></span>Monatsmittel 2022</h1></center>
        <?php include("src/php/modules/avg_month_2022.php"); ?>
        <img src="src/php/jpgaph_diagrams/jpg/avg_chart_2022.jpg" class="img-fluid" alt="..."/>
    </body>
</html>