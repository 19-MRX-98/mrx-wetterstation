<style>
    .container{
        margin-left: 0;
    }
</style>
<?php
    function getDockerContainerStatus() {
        $ini = parse_ini_file("config/cloudpanel.ini");
        //require_once("/var/www/html/php/globals/global_functions.php");
        // Docker API URL für Container-Informationen
        $url = $ini['docker_data_fechter'];
        logs("Fetching Container Data from $url","INFO");
        // cURL-Initialisierung
        $ch = curl_init($url);

        // cURL-Optionen setzen
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // HTTP-Anfrage ausführen
        $response = curl_exec($ch);

        // cURL-Verbindung schließen
        curl_close($ch);

        // JSON-Daten decodieren
        $containers = json_decode($response);
        //logs("API Response: $response","INFO");
        // Container-Status ausgeben
        echo "
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        Containername
                    </div>
                    <div class='col'>
                        Containerlaufzeit
                    </div>
                    <div class='col'>
                        Containerstatus
                    </div>
                </div>
            </div>
            ";
        if (!empty($containers)) {
            foreach ($containers as $container) {
                $container_names=implode($container->Names);
                echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='col'>
                                $container_names
                            </div>
                            <div class='col' width ='100px'>
                                $container->Status
                            </div>
                            <div class='col' width ='100px'>
                                $container->State 
                            </div>
                        </div>
                    </div>
                ";
    
                
            }
            $containerCount = count($containers);
            logs(" $containerCount Container auf Hostsystem installiert","INFO");
        } else {
            logs("Keine Container gefunden, bitte System überprüfen","FATAL");
        }
    }
    // Aufruf der Funktion, um Container-Status zu erhalten und auszugeben
    getDockerContainerStatus();
?>
