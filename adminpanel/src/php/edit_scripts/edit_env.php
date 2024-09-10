<?php
$ini = parse_ini_file("config/cloudpanel.ini");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $key = $_POST['key'];
        $newValue = $_POST['value'];

        $envFile = $ini["env_path"];
        $lines = file($envFile, FILE_IGNORE_NEW_LINES);

        foreach ($lines as &$line) {
            if (strpos($line, $key) === 0) {
                $line = "$key=$newValue";
                break;
            }
        }

        file_put_contents($envFile, implode(PHP_EOL, $lines));

        header('Location: /panel_settings');
        exit();
    }
?>