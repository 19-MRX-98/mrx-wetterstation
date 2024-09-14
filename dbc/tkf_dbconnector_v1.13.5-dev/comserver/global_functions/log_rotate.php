<?php
        require_once("global_functions.php");
        function log_rotate($logfile)
        {
            $maxLogSize = 5000000;
            $timestamp = date("l jS \of F Y h:i:s A");
        
            $zip = new ZipArchive();
            $zipFilename = "/tkf_com/logs/dbc_log_" . $timestamp . ".zip";

            if(filesize($logfile) < $maxLogSize){
                $dg=filesize($logfile)/1024/1024;
                $dateigroesse=round($dg,2);
                logs("Logfilegröße: $dateigroesse MB","INFO");
            }

            // Check if log file size exceeds maximum limit
            if (filesize($logfile) > $maxLogSize) {
                // Create a new ZIP archive
                if ($zip->open($zipFilename, ZipArchive::CREATE) === true) {
                    // Add the log file to the archive
                    $zip->addFile($logfile, basename($logfile));
                    // Close the ZIP archive
                    $zip->close();
        
                    // Rotate the log file by moving it to a new file
                    rename($logfile, "/tkf_com/logs/dbc_log_" . $timestamp . ".log");
                    logs("Erstelle neues Logfile","INFO");
                }
            }
        }
        
        log_rotate($logfile);
?>