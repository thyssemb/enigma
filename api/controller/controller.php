<?php

namespace App\Controller;

use App\Chiffrement\Cesar;
use App\Chiffrement\Vigenere;
use App\Chiffrement\OneTimePad;

require_once __DIR__ . '/../../src/cesar.php';
require_once __DIR__ . '/../../src/vigenere.php';
require_once __DIR__ . '/../../src/one_time_pad.php';

/**
 * Controller qui redirige dans le bon service d'algo
 **/

class Controller {

    private $allowedMethods = ['POST'];

    public function handleRequest($algo, $char, $key, $action, $generate_key)
    {
        $result = '';

        switch ($algo) {
            case 'cesar':
                $cesar = new Cesar($key, $char);
                $result = ($action == 'encrypt') ? $cesar->encrypt($char) : $cesar->decrypt($char);
                break;
            case 'vigenere':
                $vigenere = new Vigenere($key, $char, $action == 'encrypt');
                if (strlen($key) == strlen($char)) {
                    $result = ($action == 'encrypt') ? $vigenere->encrypt() : $vigenere->decrypt();
                } else {
                    echo "Les phrases entrées ne sont pas de la même longueur";
                }
                break;
            case 'masque_jetable':
                $onetimepad = new OneTimePad($char, $generate_key);
                $result = ($action == 'encrypt') ? $onetimepad->encrypt($char) : $onetimepad->decrypt($char);
                break;
            default:
                $result = "Algorithme non valide.";
                break;
        }

        return $result;
    }
}

$controller = new Controller();
