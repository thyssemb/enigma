<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo César
 */
class Cesar {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $text = 'hello';
    public $key = 4;
    public $result = '';

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

        for ($i = 0; $i < strlen($this->result); $i++) {
            $char = $this->result[$i];

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
