<?php
    function generateKeypair($keyBits = 2048) {
        // Konfigurationsoptionen für den Schlüsselpaar-Generator
        $config = array(
            "private_key_bits" => $keyBits, // Schlüsselgröße (Standard: 2048)
            "private_key_type" => OPENSSL_KEYTYPE_RSA, // Schlüsselpaar-Typ (RSA)
        );

        // Neuen privaten Schlüssel generieren
        $res = openssl_pkey_new($config);

        if (!$res) {
            return logs("Fehler bei Erstellung des Schlüsselpaars","ERROR");
        }

        // Privaten Schlüssel exportieren
        openssl_pkey_export($res, $privateKey);

        // Öffentlichen Schlüssel extrahieren
        $publicKeyDetails = openssl_pkey_get_details($res);
        $publicKey = $publicKeyDetails["key"];

        // Rückgabe des Schlüsselpaars als Array
        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];
    }

    // Beispiel: Schlüssel generieren
    $keypair = generateKeypair();

    // Ausgabe des Schlüsselpaars
    if (!isset($keypair['error'])) {
        echo "Private Key:\n" . $keypair['privateKey'] . "\n\n";
        echo "Public Key:\n" . $keypair['publicKey'] . "\n";
        logs("Keypair Erstellt","INFO");
    } else {
        echo "Fehler bei Erstellung einens Schlüsselpaars. Dieser Fehler wurde geloggt.";
        logs($keypair['error'],"ERROR");
    }
?>
