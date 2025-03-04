<?php

use App\Chiffrement\Cesar;
use App\Chiffrement\Vigenere;
use App\Chiffrement\OneTimePad;

/**
 * Controller qui redirige dans le bon service
 */

class Controller {

    public function handleCesar($phrase, $key) {
        $cesar = new Cesar($key);
        $result = $cesar->chiffrer($phrase);
        return $result;
    }

    public function handleVigenere($phrase, $key) {
        $vigenere = new Vigenere($key);
        $result = $vigenere->chiffrer($phrase);
        return $result;
    }

    public function handleMasqueJetable($phrase, $key) {
        $otp = new OneTimePad($key);
        $result = $otp->chiffrer($phrase);
        return $result;
    }
}
