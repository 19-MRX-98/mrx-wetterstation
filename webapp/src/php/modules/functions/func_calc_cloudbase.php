<?php
    // Funktion zur Berechnung der Wolkenbasis
    function berechneWolkenbasis($gerechnete_temperatur, $taupunkt) {
        // Konstante für die Berechnung der Wolkenbasis in Metern
        $konstante = 125;

        // Berechnung der Wolkenbasis in Metern
        $wolkenbasis = $konstante * ($gerechnete_temperatur - $taupunkt);

        return $wolkenbasis;
    }
?>