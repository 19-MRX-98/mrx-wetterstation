
<?php
		require_once("/var/www/html/src/php/globals/global_functions.php");
		require_once("$global_func");
		require_once("$log_config_ok");
		require_once("$zambretti_forecast");
		require_once("$log_http_client_info");
?>

<style>
    img{
        width: 36px;
        height: 36px;
        margin-left: 8px;
        padding: 3px;
        color: white;
    }
	.container-fluid {
		margin-top: 1%;
		border-radius: 2px;
		padding: 0.5%;
	}
	.alert{
		padding: 1%;
	}

</style>
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
		
	<div class="container-fluid bg-secondary text-white">
        	<div class="row">
				<div class="col-md-6">
					<div class="p-3 text-white">
						<caption><h1><span class="badge bg-dark">Wettervorhersage nach Zambretti</span></h1></caption>
						<!--Erklärbutton -->
							<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Erklärung</button>
								<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
									<div class="offcanvas-header">
										<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Erklärung</h5><hr>
											<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
									</div>
									<div class="offcanvas-body">
										<p>
											<?php include ("$zambretti_forecast_html_output") ?>
										</p>
									</div>
								</div>
							<!--Ende Code Erklärbutton -->
							<div class="container-fluid">
								<p>
									<?php
										include("$zambretti_calculation");
									?>
								</p>
							</div>
							<caption><h1><span class="badge bg-dark">5 Tages Vorhersage</span></h1></caption>
							<div id="openweathermap-widget-21"></div>
							<script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script><script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 21,cityid: '2945474',appid: '4450ede91f808d165263d1196233a338',units: 'metric',containerid: 'openweathermap-widget-21',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
						</div>
						
					</div>
            	<div class="col-md-6">
               		<div class="p-3 bg-secondary text-white">
					   <caption><h1><span class="badge bg-dark">Gewitterpotential der Luftmasse</span></h1></caption>
					   <?php
							include("$theta_e_out");
						?>
						<?php
							include("$cloudbase");
						?>
					</div>
                </div>
			</div>
        </div>
    </div>

		
		<div class="container-fluid bg-secondary text-white">
			<center><caption><h1><span class="badge bg-dark">Aktuelles Wetter</span></h1></caption></center>
				<div class = "row">
					<?php require_once($actual_weather); ?>
					<div class='col-sm-6'>
						<div class='card text-center'>
							<div class='card-body'>
								<h5 class='card-title'>Windrichtung</h5><hr>
								<p class='card-text'><?php require_once("$wind")?></p>
							</div>
						</div>
					</div>
					<div class='col-sm-6'>
						<div class='card text-center'>
							<div class='card-body'>
								<h5 class='card-title'>Windchill</h5><hr>
								<p class='card-text'><img src = 'src/pictures/icons8/icons8-windchill-96.png'></img><?php require_once("$windchill")?></p>
							</div>
						</div>
					</div>
					<div class='col-12'>
						<div class='card text-center'>
							<div class='card-body'>
								<h5 class='card-title'>Niederschlag 1h</h5><hr>
								<p class='card-text'><img src = 'src/pictures/icons8/icons8-raining-60.png'></img><?php require_once("$perticipation")?></p>
							</div>
						</div>
					</div>
				</div>
		</div>
    </body>
<html>