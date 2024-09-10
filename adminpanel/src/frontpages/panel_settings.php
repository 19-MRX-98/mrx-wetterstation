<?php
    require_once("/var/www/html/php/globals/global_functions.php");
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
        <script src="js/copy_to_clipboard.js" async></script>
        <title>Cloudpanel</title>
    </head>
    <body>
        <?php include("html/nav.php") ?>
        <div class="container-fluid bg-body-tertiary rounded-3">
            <h1>Umgebungseinstellungen</h1>
                <div class="accordion accordion-flush" id="accordionFlush">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Authentifizierungstoken TKF_CLOUD
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                            <div class="accordion-body">
                               <div class="alert alert-info" role="alert">
                                    <img src = "images/icons/icons8-info-50.png"</img>  Dieses Authentifizierungstoken muss in den Datenbank Connector Einstellungen unter TKF_CLOUD -> gateway_auth angegeben und ebenfalls in der Wifi Extension hinterlegt werden. 
                                    Ansonsten kann keine Verbindung hergestellt werden. <br><br>        
                                    <button type="button" class="btn btn-secondary"><a href="/connector_config" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Zu den Connectoreinstellungen</a></button>
                                </div>
                                    <span class="badge text-bg-primary"style="margin-top: 10px; margin-right:2px;font-size: 14pt;">Authentifizierungstoken:</span><span class="badge text-bg-secondary" style="margin-top: 10px; margin-bottom:10px;font-size: 14pt;"><?php echo generateSoftwareUID(); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Konfigurationsdatei Cloudpanel
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                            <div class="accordion-body">
                                <?php include("php/module/parse_cloudpanel_ini.php"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                           Umgebungsvariablen Dockercontainer
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                            <div class="accordion-body">
                                <?php include("php/module/parse_docker_env.php"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            ?!
                        </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                            <div class="accordion-body">
                                <?php //include("php/module/parse_docker_env.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
<html></html>