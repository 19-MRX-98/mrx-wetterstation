<?php
if($ausg <= 40){
    #echo "Ampel Rot";
    echo "<img src='src/pictures/icons8/icons8-red-circle-48.png'alt=''/>";
}
elseif($ausg >= 40 && $ausg <= 60){
    #echo "Ampel Orange";
    echo "<img src='src/pictures/icons8/icons8-yellow-circle-48.png'alt=''/>";
}
elseif($ausg >= 60){
    #echo "Ampel Grün";
    echo "<img src='src/pictures/icons8/icons8-green-circle-48.png'alt='dd'/>";
}
?>