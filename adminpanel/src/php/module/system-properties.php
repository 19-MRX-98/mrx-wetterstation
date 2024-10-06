<?php
    header('Content-Type: application/json');
    ob_start();
    //cpu stat
    $prevVal = shell_exec("cat /proc/stat");
    $prevArr = explode(' ', trim($prevVal));
    $prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
    $prevIdle = $prevArr[5];
    usleep(0.15 * 1000000);
    $val = shell_exec("cat /proc/stat");
    $arr = explode(' ', trim($val));
    $total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
    $idle = $arr[5];
    $intervalTotal = intval($total - $prevTotal);
    $cpuUsage = intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
    $cpu_result = shell_exec("cat /proc/cpuinfo | grep 'model name'");
    $cpu_model = strstr($cpu_result, "\n", true);
    $cpu_model = str_replace("model name    : ", "", $cpu_model);
    $cpu_model = trim($cpu_model); // Entferne unnötige Leerzeichen/Zeilenumbrüche

    //memory stat
    $mem_percent = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
    $mem_total = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", shell_exec("cat /proc/meminfo | grep MemTotal")) / 1024 / 1024, 3);
    $mem_free = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", shell_exec("cat /proc/meminfo | grep MemFree")) / 1024 / 1024, 3);
    $mem_used = $mem_total - $mem_free;

    //hdd stat
    $hdd_free = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
    $hdd_total = round(disk_total_space("/") / 1024 / 1024 / 1024, 2);
    $hdd_used = $hdd_total - $hdd_free;
    $hdd_percent = round(sprintf('%.2f', ($hdd_used / $hdd_total) * 100), 2);

    //network stat
    $network_rx = round(trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes")) / 1024 / 1024 / 1024, 2);
    $network_tx = round(trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")) / 1024 / 1024 / 1024, 2);

    // Zusammenstellen der Daten in ein Array
    $stat = [
        'cpu' => $cpuUsage,
        'cpu_model' => $cpu_model,
        'mem_percent' => $mem_percent,
        'mem_total' => $mem_total,
        'mem_used' => $mem_used,
        'mem_free' => $mem_free,
        'hdd_free' => $hdd_free,
        'hdd_total' => $hdd_total,
        'hdd_used' => $hdd_used,
        'hdd_percent' => $hdd_percent,
        'network_rx' => $network_rx,
        'network_tx' => $network_tx
    ];

    // Daten als JSON ausgeben
    echo json_encode($stat, JSON_PRETTY_PRINT);
    ob_end_flush();
?>
