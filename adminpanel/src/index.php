<?php

// Router Klasse einbinden
include('php/php_router/router.php');
// Add base route (/)
Route::add('/',function(){
    include("html/frontpage.php");
});
Route::add('/ba41f6a85c1ee640d7b7ee303aa6312320b9a55a',function(){
    include("frontpages/start.php");
});
Route::add('/ba41f6a85c1ee640d7b7ee303aa',function(){
    include("frontpages/crontab.php");
});
Route::add('/400718fa87db640d6cf852a8c1f7f8ac475de3c4',function(){
    include("html/html-forms/frm_create_db.html");
});
Route::add('/licences',function(){
    include("frontpages/licences.php");
});
Route::add('/api/dockerstatus',function(){
    include("php/functions/get_dockerstatus.php");
});
Route::add('/containerstatus',function(){
    include("php/functions/show_containerstatus.php");
});
Route::add('/panel_settings',function(){
    include("frontpages/panel_settings.php");
});
Route::add('/connector_config',function(){
    include("frontpages/tkf_dbc_ini.php");
});
Route::add('/webapp_config',function(){
    include("frontpages/tkf_webapp_ini.php");
});
Route::add('/crontab',function(){
    $ini = parse_ini_file("/tkf_ini/comserver.ini");
    include($ini['crontabui']);
});
Route::add('/17c59beb8da0a081f2ed7335a17aad273eb84755',function(){
    include("php/module/check_for_db.php");
},'post');
Route::add('/edit_ini',function(){
    include("php/edit_scripts/edit_ini.php");
},'post');
Route::add('/edit_cloudpanel_ini',function(){
    include("php/edit_scripts/edit_cloudpanel_ini.php");
},'post');
Route::add('/edit_webapp_ini',function(){
    include("php/edit_scripts/edit_webapp_ini.php");
},'post');
Route::add('/edit_docker_env',function(){
    include("php/edit_scripts/edit_env.php");
},'post');
// Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar',function($var1){
    echo $var1.' is a great number!';
});
Route::run('/');

?>