<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo Masque jetable
**/


class OneTimePad {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $char;
    public $generate_key;
    public $result = '';

    public function __construct($generate_key, $char) {
        $this->key = $key;
        $this->char = $char;
    }

    public function encrypt() {

    }
}
