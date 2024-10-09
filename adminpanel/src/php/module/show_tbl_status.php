<?php

    // Verbindung zur Datenbank herstellen
    $host = $ini['db_host'];
    $db = $ini['database'];
    //echo $host = $ini['db_host'];

    $pdo = new PDO("mysql:host=$host;dbname=$db", $ini['db_username'], $ini['db_password']);

    // Abfrage 5: Speicher- und Tabelleninformationen mit INFORMATION_SCHEMA
    $table_status = $pdo->query("
        SELECT 
            table_schema AS `Database`, 
            table_name AS `Table`, 
            engine AS `Engine`, 
            table_rows AS `Rows`, 
            data_length AS `Data Size`, 
            index_length AS `Index Size`
        FROM information_schema.tables
        WHERE table_schema = '$db';
    ")->fetchAll(PDO::FETCH_ASSOC);
    echo "
        <div class='table-responsive'>
            <table class = 'table table-hover'>
                <thead class='table-primary'>
                    <th scope='col'>Datenbank</th>
                    <th scope='col'>Tabellenname</th>
                    <th scope='col'>Zeilen</th>
                    <th scope='col'>Tabellengröße</th>
                </thead>
                <tbody class='table-group-divider'>
    ";
    foreach ($table_status as $table) {
        $database= $table['Database'];
        $tbl=$table['Table'];
        $rows=$table['Rows'];
        $tbl_size=$table['Data Size'];
        $tbl_size_mb= round($tbl_size/1048576,3);
        $formatted_tbl_size_mb = number_format($tbl_size_mb,2,',','');

        echo "
        <tr>
           <td>
              $database
           </td>
           <td>
              $tbl
           </td>
           <td>
              $rows
           </td>
           <td>
              $formatted_tbl_size_mb MB
           </td>
       </tr>
   ";	
    }
?>