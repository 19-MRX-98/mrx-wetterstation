<?php
date_default_timezone_set("Europe/Berlin");
require_once("/var/www/html/src/conf/config.inc.php");
?>
<!DOCTYPE html>
<html>
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
        <div>
        <center><h1><span class="badge bg-dark"></span>Tageswerte <?php echo date("Y"); ?></h1></center>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Januar
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/january.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Februar
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/february.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        März
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/march.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        April
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/april.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Mai
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/may.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSic">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Juni
                    </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/june.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSev">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSev" aria-expanded="false" aria-controls="collapseSev">
                        Juli
                    </button>
                    </h2>
                    <div id="collapseSev" class="accordion-collapse collapse" aria-labelledby="headingSev" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/july.php" ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEig">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEig" aria-expanded="false" aria-controls="collapseEig">
                        August
                    </button>
                    </h2>
                    <div id="collapseEig" class="accordion-collapse collapse" aria-labelledby="headingEig" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/august.php" ?>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        September
                    </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/september.php" ?>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingT">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseT" aria-expanded="false" aria-controls="collapseT">
                        Oktober
                    </button>
                    </h2>
                    <div id="collapseT" class="accordion-collapse collapse" aria-labelledby="headingT" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/october.php" ?>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading11">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                        November
                    </button>
                    </h2>
                    <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/november.php" ?>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading12">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                        Dezember
                    </button>
                    </h2>
                    <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php include "src/php/modules/avg/actual_year/december.php" ?>
                    </div>
                </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>