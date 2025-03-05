<?php

namespace App\Chiffrement;

/**
 * Classe pour l'algo César
 */
class Cesar {

    public $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public $text = 'salut';
    public $key = 3;

    public function returnChar() {
        $result = '';

        for ($i = 0; $i < strlen($this->text); $i++) {
            $char = $this->text[$i];

            $result .= $char;
        }

        return $result;
    }

    public function controller() {

    }
}

$cesar = new Cesar();

$result = $cesar->returnChar();
echo $result;
?>
