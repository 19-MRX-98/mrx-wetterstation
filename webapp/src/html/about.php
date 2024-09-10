<?php 
    require_once("/var/www/html/src/conf/config.inc.php");
    include("src/php/modules/log_modules/log_parse.php");
?>
<!DOCTYPE html>
<html lang="de" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8" />
        <title>About</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css">
        <script src="/src/js/bootstrap.bundle.min.js" async></script>
        <?php include("src/html/header.php");?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <p>
                        <?php include("src/php/parser/parse_news.php"); ?>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p>
                       <h4>Lizenz</h4>
                       <?php include("src/php/parser/parse_licence.php"); ?>
                    </p>
                </div>
            </div>
        </div>
    </body>