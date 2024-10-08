<?php
    require_once("/var/www/html/src/php/globals/global_functions.php");
?>
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
        <center><h1><span class="badge bg-dark"></span>Niederschlag 2023</h1></center>
        <?php include("src/php/modules/functions/func_rainfall_2024.php"); ?>
    </body>
</html>