<?php
    function generateSoftwareUID() {
        // Beispiel zur Generierung einer eindeutigen Software UID
        $unique_string = php_uname() . gethostbyname(gethostname()) . time();
        $uuid = md5($unique_string);
        return $uuid;
    }
    echo generateSoftwareUID();
?>