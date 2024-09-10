<?php
ob_start();
/**
 * DashboardBuilder
 *
 * @author Diginix Technologies www.diginixtech.com
 * Support <support@dashboardbuider.net> - https://www.dashboardbuilder.net
 * @copyright (C) 2016-2024 Dashboardbuilder.net
 * @version 7.0
 * @license: This code is under MIT license, you can find the complete information about the license here: https://dashboardbuilder.net/code-license
 */

$_SESSION["DF"]="";
$_SESSION["NF0"]="";
$_SESSION["NF"]="";

  // copy this file to inc folder 
?>
<!DOCTYPE html>
<html lang="en-us" dir="ltr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="https://cdn.jsdelivr.net/gh/DashboardBuilder/cdn@master/v55/jquery.min.js"></script>
<style>
@media screen and (min-width: 960px) {
.id0 {position:absolute; top:0px;}

}
.card-header {line-height:0.7em;}
#number {font-size:32px; font-weight:bold;text-align:center;margin-top:-10px;}
#number_legand {font-size:11px; text-align:center;}
.panel-body {  box-shadow: 5px 5px 35px  #e0e0e0;color:#787b80;}
.page-header {margin-top:-30px;}.dropdown-toggle{font-size:12px;line-height:12px;}
	.selectoption {font-size:12px !important;}
	.bs-searchbox > input {
	  font-size: 12px;
	  height:26px;
	}
</style>
</head>
<body> 

<?php
// for chart #1
$data = new dashboardbuilder(); 
$data->type[0]=  "area";
$data->type[1]=  "area";

$data->legacy = "";
$data->source =  "Database"; 
$data->rdbms =  "mysql"; 
$data->servername =  "dev-srv01.riedel.lan";
$data->username =  "root";
$data->password =  "es5Gx40UrpyvcXvRMnGemw==";
$data->dbname =  "$database";
$data->toImage = "Download graph";
$data->zoomin = "Zoom in";
$data->zoomout = "Zoom out";
$data->autoscale = "Reset";
$data->filterlabel = "Filter";
$data->forecastlabel = "Forecast";
$data->VIEW_DATA = "Analyze Data";
$data->CLOSE = "Close";
$data->CSV_DOWNLOAD = "CSV Download";
$data->PDF_DOWNLOAD = "PDF Download";
$data->forecastlabel = "Forecast";
$data->filter = "true";
$data->csvdata = "true";
$data->llm = "";
$data->xaxisSQL[0]=  "SELECT DATETIME,temperatur/10 as temp FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
$data->xaxisCol[0]=  "temp";
$data->xsort[0]=  "";
$data->xmodel[0]=  "";
$data->forecast[0]=  "0";
$data->xaxisSQL[1]=  "SELECT DATETIME,feuchte FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
$data->xaxisCol[1]=  "feuchte";
$data->xsort[1]=  "";
$data->xmodel[1]=  "";
$data->forecast[1]=  "";
$data->yaxisSQL[0]=  "SELECT DATETIME,temperatur/10 as temp FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
$data->yaxisCol[0]=  "DATETIME";
$data->ysort[0]=  "";
$data->ymodel[0]=  "";
$data->yaxisSQL[1]=  "SELECT DATETIME,feuchte FROM wetterdaten01 WHERE date(datetime) = CURDATE()";
$data->yaxisCol[1]=  "DATETIME";
$data->ysort[1]=  "";
$data->ymodel[1]=  "";

$data->name = "Temperaturverlauf";
$data->title = "Temperatur&Luftfeuchte";
$data->orientation = "h";
$data->dropdown = "true";
$data->side = "left";
$data->toImage = "Download graph";
$data->zoomin = "Zoom in";
$data->zoomout = "Zoom out";
$data->autoscale = "Reset";
$data->filter = "true";
$data->csvdata = "true";
$data->llm = "";
$data->forecastlabel = "Forecast";
$data->CLOSE = "Close";
$data->CSV_DOWNLOAD = "CSV Download";
$data->PDF_DOWNLOAD = "PDF Download";
$data->legposition = "";
$data->xaxistitle = "Zeit";
$data->yaxistitle = "Temperatur";
$data->datalabel = "false";
$data->showgrid = "true";
$data->showline = "true";
$data->tablefontsize = "9";
$data->height = "700";
$data->width = "700";
$data->col = "0";

$data->plot = "dynamic";
$data->font_color = "";
$data->bg_color = "";
$data->border_color = "";
$data->border_width = "0";
$data->tracename[0]=  "Temperatur";
$data->tracename[1]=  "Luftfeuchte";
$data->yntitle[1]=  "Luftfeuchte";

if (isset($_REQUEST["jsonformat"])) {
	if ($_REQUEST["jsonformat"]==0) {
	ob_end_clean();
	$rc = $_REQUEST["jsonformat"];	

	$rows = $data->database();
	$key =0;
	foreach ($rows->xaxis[0] as $row) {
	$datas[$key][$data->xaxisCol[0]] = $rows->xaxis[0][$key];
	$key++;
	}	

	$key =0;
	foreach ($rows->yaxis[0] as $row) {
	$datas[$key][$data->yaxisCol[0]] = $rows->yaxis[0][$key] ;
	$key++;
	}

		header("Content-type: application/json");
		echo json_encode($datas);

	exit();	
	}
}

if (!isset($_REQUEST["jsonformat"])) {
$result[0] = $data->result();
}?>
<div class="container-fluid main-container position-relative">
<div class="col col-md-12 col-lg-12 col-xs-12">
	<div class="row my-4">
	<div class="col-md-12 col-xs-12  id0">
	<div class="card-default shadow">
		<div class="card-body bgcolor">
		<span class="d-flex justify-content-start mx-2 font-color">Temperatur&Luftfeuchte</span>
			<?php echo $result[0];?>
		</div>
	</div>
	</div>
	</div>
</div>
</div>


</body>


				<script>
	var url0 = "<?php echo $_SERVER['REQUEST_URI'];?>?jsonformat=0";
		var xl00 = [];
		var yl00 = [];
		var xl01 = [];
		var yl01 = [];          setInterval(function() {
                    $.getJSON(url0+"&"+Math.random().toString(16).slice(2), 
                        function (data) {
                        $.each(data, function (key, value) { 
							   xl00.push(value["temp"]); 
                               yl00.push(value["DATETIME"]); 
							   xl01.push(value["feuchte"]); 
                               yl01.push(value["DATETIME"]); 
						});	
								var data_update = {
								x: [xl00,xl01],
								y: [yl00,yl01]
								};
								var layout_update = {
							 xaxis: {					
							type: "category",
							showticklabels:true,
							title: "Zeit", 
							showgrid: true, 
						    showline: true
								},
												
					  yaxis: {											
							categoryorder: "array", 
							title: "Temperatur", 
							side: "left", 
							showticklabels:true,
						    showgrid: true, 
						    showline: true,
							categoryarray: [yl00,yl01]
							}
					  };
						DashboardBuilder.extendTraces ("col0", data_update,[0,1], 20);
			  });
  					  xl00 = [];
					  yl00 = [];
  					  xl01 = [];
					  yl01 = [];}, 60000); 	
		</script>