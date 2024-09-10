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
        <title>Cloudpanel - Lizenzverwaltung</title>   
    </head>
    <body>
        <?php include("html/nav.php") ?>
        <?php //include("html/footer.html") ?>
        <!--?php include("php/functions/generate_uuid.php") ?-->
            <div class="container-fluid">
                <div class="p-5 text-center bg-body-tertiary rounded-3">
                    <h1>Wetterstation registrieren</h1>
                    <div class="row mb-3">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Registrierungsserver</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="https://reg.tkf.io" readonly>
                            </div>
                    </div>
                </div>
            </div>
    </body>
<html>