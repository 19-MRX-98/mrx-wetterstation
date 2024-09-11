<?php

    function taupunkt($lufttemperatur, $luftfeuchtigkeit) {
        //Taupunktkonstanten bei Standardathmosphäre
        $konstante_a = 17.27;
        $konstante_b = 237.7;
            $gamma = log($luftfeuchtigkeit / 100) + ($konstante_a * $lufttemperatur) / ($konstante_b + $lufttemperatur);
            $taupunkt = ($konstante_b * $gamma) / ($konstante_a - $gamma);
        return round($taupunkt, 2);
        }
        
?>