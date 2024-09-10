<?php
      $ini = parse_ini_file("/var/www/html/src/conf/webapp.ini");
      require 'src/php/analog/lib/Analog.php';
      require_once("/var/www/html/src/conf/config.inc.php");
      require_once("src/php/modules/log_modules/log_http_client_info.php");
?>
<!doctype html>
<html lang="de" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css">
        <script src="/src/js/bootstrap.bundle.min.js" async></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/Chart.min.js"></script>
        <title>
                <?php echo $wsname;?>
        </title><!--Put your Weatherstation's Name in the Configurations PHP-->
        <?php include("src/html/header.php");?>
    </head>
    <body>
        <center></center>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered caption-top">
            <caption><h1><span class="badge bg-dark">Jahreszeitenbericht <?php echo date("Y"); ?></span></h1></caption>
                <thead class = "table-info">
                    <tr>
                        <th scope="col">Parameter
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Legende</button>
                            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Legende</h5><hr>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>
                                        <?php include ("src/html/legende.html") ?>
                                    </p>
                                </div>
                            </div>
                        </th>
                        <th scope="col">1 Quartal</th>
                        <th scope="col">2 Quartal</th>
                        <th scope="col">3 Quartal</th>
                        <th scope="col">4 Quartal</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">AVG.Temp
                        </th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/avg_temp/avg_temp_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/avg_temp/avg_temp_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/avg_temp/avg_temp_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/avg_temp/avg_temp_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Max.Temp</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/max_temp/max_temp_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/max_temp/max_temp_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/max_temp/max_temp_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/max_temp/max_temp_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Min.Temp</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/min_temp/min_temp_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/min_temp/min_temp_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/min_temp/min_temp_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/min_temp/min_temp_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Niederschlag</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/precipitation/precipitation_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/precipitation/precipitation_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/precipitation/precipitation_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/precipitation/precipitation_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Windböen</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/windGust/gust_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/windGust/gust_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/windGust/gust_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/windGust/gust_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sommertage</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/summerdays/sd_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/summerdays/sd_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/summerdays/sd_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/summerdays/sd_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Hitzetage</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatdays/hd_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatdays/hd_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatdays/hd_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatdays/hd_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Wüstentage</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/desertdays/dd_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/desertdays/dd_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/desertdays/dd_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/desertdays/dd_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Heiztage</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatingdays/heatd_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatingdays/heatd_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatingdays/heatd_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/heatingdays/heatd_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Frosttage</th>
                        <td><?php //include("src/php/modules/jahreszeitenberichte/actual_year/frostdays/id_q1_act_y.php");?></td>
                        <td><?php //include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q2_act_y.php");?></td>
                        <td><?php //include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q3_act_y.php");?></td>
                        <td><?php //include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q4_act_y.php");?></td>
                    </tr>
                    <tr>
                        <th scope="row">Eistage</th>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q1_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q2_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q3_act_y.php");?></td>
                        <td><?php include("src/php/modules/jahreszeitenberichte/actual_year/icedays/id_q4_act_y.php");?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <caption><h1><span class="badge bg-dark">Das Jahr <?php echo date("Y"); ?> zusammengefasst</span></h1></caption>
        <hr>
        <p>Hier steht bald ein parameterbasierter text</p>
    </body>
</html>
