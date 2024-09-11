<?php
    include("src/php/parser/Parsedown.php");

    $html = file_get_contents('src/misc/update.md');
    $Parsedown = new Parsedown();
    echo $Parsedown->text($html);
   
?>