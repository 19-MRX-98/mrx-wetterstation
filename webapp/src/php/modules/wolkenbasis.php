<?php

   require_once("/var/www/html/src/php/modules/functions/func_temperature_gradient.php");
    
?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered caption-top">
        <caption><h1><span class="badge bg-dark">Wolken & Höhenwetter</span></h1></caption>
            <thead class = "table-info">
                <tr>
                    <th scope="col">Wolkenhöhe von Grund</th>
                    <th scope="col">Wolkenbasistemperatur</th>
                    <th scope="col">1500m Temperatur</th>
                    <th scope="col">3000m Temperatur</th>
                    <th scope="col">5500m Temperatur</th>
                    <th scope="col">Nullgradgrenze von Wolkenbasis</th>
                    <th scope="col">Nullgradgrenze von Grund</th>
                    <th scope="col">-5 Grad Isotherme</th>
                    <th scope="col">-10 Grad Isotherme </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>~ <?php echo $hc_rounded ." m";?></td>
                    <td>~ <?php echo $wolkenbasistemperatur ." °C";?></td>
                    <td>~ <?php echo round($temp1500,2) ." °C";?></td>
                    <td>~ <?php echo round($temp3000,2) ." °C";?></td>
                    <td>~ <?php echo round($temp5500,2) ." °C";?></td>
                    <td>~ <?php echo round($freezinglevel_above_clBase,2)*1000 ." m";?></td>
                    <td>~ <?php echo round($freezinglevel_fromGround,2)*1000 ." m";?></td>
                    <td>~ <?php echo round($hoehe_minus5,2)*1000 ." m";?></td>
                    <td>~ <?php echo round($hoehe_minus10,2)*1000 ." m";?></td>
                </tr>                   
            </tbody>
    </table>
</div>