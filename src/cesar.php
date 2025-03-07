<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo César
**/
class Cesar {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $char;
    public $key;
    public $result = '';

    public function __construct($key, $char) {
        $this->key = (int) $key;
        $this->char = $char;
    }

    public function returnChar() {
        $this->result = '';

        for ($i = 0; $i < strlen($this->text); $i++) {
            $char = $this->text[$i];
            $this->result .= $char;
        }

        return $this->result;
    }

      public function chiffrement() {
            $encryptedChar = '';

            for ($i = 0; $i < strlen($this->char); $i++) {
                $char = $this->char[$i];

                if (strpos($this->alphabet, $char) !== false) {
                    $index = strpos($this->alphabet, $char);
                    $newIndex = ($index + $this->key) % strlen($this->alphabet);
                    $encryptedChar .= $this->alphabet[$newIndex];
                } else {
                    $encryptedChar .= $char;
                }
            }

            return $encryptedChar;
        }
}
