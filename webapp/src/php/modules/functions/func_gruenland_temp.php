<?php
    require_once("src/conf/config.inc.php");
    function gruenlandtemperatursumme($dbsrv,$dbuser,$passwd,$database){
        $gts_1="200";
        $gts_2= "400";
        $gts_3= "500";
        $gts_4= "700";
        $db = new mysqli($dbsrv,$dbuser,$passwd,$database);
            if($db->connect_errno)
                    {
                        echo "Keine Verbindung m&ooml;glich! Bitte kontaktieren Sie den Administrator!\n";
                        echo "Fehler".$db->connect_errno.":".$db->connect_errno; exit;
                    }
                    else
                    {
                        $get_gruenlandtemp_jan="select sum(gruenlandtemperatursumme) from view_gruenlandtemp_JAN";
                        $avg= $db->query($get_gruenlandtemp_jan);
                        while($data_avg = $avg->fetch_array()){
                           $jan = round($data_avg[0],2);
                        }
                        $get_gruenlandtemp_FEB="select sum(gruenlandtemperatursumme) from view_gruenlandtemp_FEB";
                        $avg_feb= $db->query($get_gruenlandtemp_FEB);
                        while($data_avg_feb = $avg_feb->fetch_array()){
                            $feb = round($data_avg_feb[0],2);
                        }
                        $get_gruenlandtemp_MRZ="select sum(gruenlandtemperatursumme) from view_gruenlandtemp_MRZ";
                        $avg_mrz= $db->query($get_gruenlandtemp_MRZ);
                        while($data_avg_mrz = $avg_mrz->fetch_array()){
                            $mrz = round($data_avg_mrz[0],2);
                        }

                        $gts_gesamt = $jan + $feb + $mrz;
                        //echo $gts_gesamt;
                    }
                    mysqli_close($db);
                    
                    echo "
                    <div class='row'>
                        <div class='col-sm'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'><center>Januar</center></h5>
                                    <p class='card-text'>
                                    <center><span class='badge rounded-pill text-bg-success'> $jan °C </span></center>
                                    </p>
                                </div>
                            </div>
                        </div>";
                        if($feb == 0){
                            echo "
                                <div class='col-sm'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><center>Februar</center></h5>
                                                <p class='card-text'>
                                                <center><span class='badge rounded-pill text-bg-success'> - </span></center>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        else{
                            echo "
                            <div class='col-sm'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title'><center>Februar</center></h5>
                                            <p class='card-text'>
                                            <center><span class='badge rounded-pill text-bg-success'> $feb °C </span></center>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        ";
                        }
                        if($mrz == 0){
                            echo "
                                <div class='col-sm'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><center>März</center></h5>
                                                <p class='card-text'>
                                                <center><span class='badge rounded-pill text-bg-success'>-</span></center>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        else{
                            echo "
                            <div class='col-sm'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title'><center>März</center></h5>
                                            <p class='card-text'>
                                            <center><span class='badge rounded-pill text-bg-success'> $mrz °C</span></center>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        ";
                        }
                        $fehlend1=$gts_1-$gts_gesamt;
                        $fehlend2=$gts_2-$gts_gesamt;
                        $fehlend3=$gts_3-$gts_gesamt;
                        switch($gts_gesamt){
                            case($gts_gesamt <= 200):
                                echo "
                                    <center><div id='pfeil'>
                                        <div class='shape1'></div>
                                        <div class='shape2'></div>
                                    </div></center>

                                    <div class='col-sm'>
                                        <div class='card'>
                                            <div class='card-body'>
                                                <h5 class='card-title'><center>Grünlandtemperatursumme gesamt <span class='badge text-bg-info'>New Feature</span></center></h5>
                                                    <p class='card-text'>
                                                        <div class='alert alert-light' role='alert'>
                                                            <center> <button type='button' class='btn btn-primary'>$gts_gesamt °C</button></center>
                                                        </div>

                                                        <center>
                                                            <div id='pfeil'>
                                                                <div class='shape1'></div>
                                                                <div class='shape2'></div>
                                                            </div>
                                                        </center>

                                                    <div class='alert alert-light' role='alert'>
                                                        <center> <button type='button' class='btn btn-primary'>$fehlend1 °C </button></center>
                                                        <br>
                                                        <center>
                                                            <div class='alert alert-info' role='alert'>
                                                            verbleibend bis zum Beginn des nachhaltigen Pflanzenwachstum 
                                                            </div>
                                                        </center>
                                                    </div>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                ";
                                break;
                                case($gts_gesamt <= 400):
                                    echo "
                                        <center><div id='pfeil'>
                                            <div class='shape1'></div>
                                            <div class='shape2'></div>
                                        </div></center>
    
                                        <div class='col-sm'>
                                            <div class='card'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'><center>Grünlandtemperatursumme gesamt <span class='badge text-bg-info'>New Feature</span></center></h5>
                                                        <p class='card-text'>
                                                            <div class='alert alert-light' role='alert'>
                                                                <center> <button type='button' class='btn btn-primary'>$gts_gesamt °C</button></center>
                                                            </div>
    
                                                            <center>
                                                                <div id='pfeil'>
                                                                    <div class='shape1'></div>
                                                                    <div class='shape2'></div>
                                                                </div>
                                                            </center>
    
                                                        <div class='alert alert-light' role='alert'>
                                                            <center> <button type='button' class='btn btn-primary'>$fehlend2 °C </button></center>
                                                            <br>
                                                            <center>
                                                                <div class='alert alert-info' role='alert'>
                                                                verbleibend bis zum Beginn der Vorblüte der Birke
                                                                </div>
                                                            </center>
                                                        </div>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                    break;
                                    case($gts_gesamt <= 500):
                                        echo "
                                            <center><div id='pfeil'>
                                                <div class='shape1'></div>
                                                <div class='shape2'></div>
                                            </div></center>
        
                                            <div class='col-sm'>
                                                <div class='card'>
                                                    <div class='card-body'>
                                                        <h5 class='card-title'><center>Grünlandtemperatursumme gesamt <span class='badge text-bg-info'>New Feature</span></center></h5>
                                                            <p class='card-text'>
                                                                <div class='alert alert-light' role='alert'>
                                                                    <center> <button type='button' class='btn btn-primary'>$gts_gesamt °C</button></center>
                                                                </div>
        
                                                                <center>
                                                                    <div id='pfeil'>
                                                                        <div class='shape1'></div>
                                                                        <div class='shape2'></div>
                                                                    </div>
                                                                </center>
        
                                                            <div class='alert alert-light' role='alert'>
                                                                <center> <button type='button' class='btn btn-primary'>$fehlend3 °C </button></center>
                                                                <br>
                                                                <center>
                                                                    <div class='alert alert-info' role='alert'>
                                                                    verbleibend bis zum Beginn der Kirsch- und Birkenblüte
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            </p>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                        break;
                                        case($gts_gesamt <= 700):
                                            echo "
                                                <center><div id='pfeil'>
                                                    <div class='shape1'></div>
                                                    <div class='shape2'></div>
                                                </div></center>
            
                                                <div class='col-sm'>
                                                    <div class='card'>
                                                        <div class='card-body'>
                                                            <h5 class='card-title'><center>Grünlandtemperatursumme gesamt <span class='badge text-bg-info'>New Feature</span></center></h5>
                                                                <p class='card-text'>
                                                                    <div class='alert alert-light' role='alert'>
                                                                        <center> <button type='button' class='btn btn-primary'>$gts_gesamt °C</button></center>
                                                                    </div>
            
                                                                    <center>
                                                                        <div id='pfeil'>
                                                                            <div class='shape1'></div>
                                                                            <div class='shape2'></div>
                                                                        </div>
                                                                    </center>
            
                                                                <div class='alert alert-light' role='alert'>
                                                                    <center> <button type='button' class='btn btn-primary'>$fehlend4 °C </button></center>
                                                                    <br>
                                                                    <center>
                                                                        <div class='alert alert-info' role='alert'>
                                                                        verbleibend bis zum Beginn der Apfelblüte
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                                </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                            break;
                        }


        }
    gruenlandtemperatursumme($dbsrv,$dbuser,$passwd,$database);
?>