<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo Masque jetable
**/


class One_Time_Pad {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $char;
    public $key;
    public $result = '';

    public function __construct($key, $char) {
        $this->key = $key;
        $this->char = $char;
    }

    public function encrypt() {

    }
}
