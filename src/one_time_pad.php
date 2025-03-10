<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo Masque jetable
**/


class OneTimePad {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $char;
    public $key;
    public $result = '';

    public function __construct($key, $char) {
        $this->key = $key;
        $this->char = $char;
    }

// la clé doit être supérieure ou égale à la phrase à crypter
// les caractères de la clé doivent être généré de manière aléatoire

    public function encrypt() {

    }
}
