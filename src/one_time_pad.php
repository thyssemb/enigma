<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo du Masque Jetable (One-Time Pad)
 **/
class OneTimePad {
    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $char;
    public $generate_key;
    public $result = '';

    public function __construct($char, $generate_key) {
        $this->char = $char;
        $this->generate_key = $generate_key;
    }

    public function encrypt() {
        $this->result = '';

        // calcule la longueur de la chaîne à chiffrer.
        $length = strlen($this->char);

        // if (strlen($this->generate_key) !== $length) {
               // throw new \Exception("La clé doit être de la même longueur que la phrase à crypter.");
          //  }

        // parcourt chaque caractère de la chaîne
        for ($i = 0; $i < $length; $i++) {
            $charIndex = strpos($this->alphabet, $this->char[$i]);
            $generate_keyIndex = strpos($this->alphabet, $this->generate_key[$i]);

            if ($charIndex === false || $generate_keyIndex === false) {
                $this->result .= $this->char[$i];
                continue;
            }
            $sum = $charIndex + $generate_keyIndex;

            if ($sum > 25) {
                $sum %= 26;
            }

            $this->result .= $this->alphabet[$sum];
        }

        return $this->result;
    }

  public function decrypt() {
        $this->result = '';

        $length = strlen($this->char);

            for ($i = 0; $i < $length; $i++) {
            $charIndex = strpos($this->alphabet, $this->char[$i]);
            $generate_keyIndex = strpos($this->alphabet, $this->generate_key[$i]);

            if ($charIndex === false || $generate_keyIndex === false) {
                $this->result .= $this->char[$i];
                continue;
            }

            $diff = $charIndex - $generate_keyIndex;
            if ($diff < 0) {
                $diff += 26;
            }

            $this->result .= $this->alphabet[$diff];
        }

        return $this->result;
    }
}
