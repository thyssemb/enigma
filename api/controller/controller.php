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

    public function handleRequest($algo, $char, $key, $encrypt, $generate_key)
       {
           $result = '';

           switch ($algo) {
               case 'cesar':
                   $cesar = new Cesar($key, $char);
                   $result = $cesar->encrypt($char);
                   break;
               case 'vigenere':
                   $vigenere = new Vigenere($key, $char, $encrypt);
                   if (strlen($key) == strlen($char)) {
                   $result = $vigenere->encrypt();
                   } else {
                   echo "Les phrases entrées ne sont pas de la même longueur";
                   }
                   break;
               case 'masque_jetable':
                   $onetimepad = new OneTimePad($char, $generate_key);
                   break;
               default:
                   $result = "Algorithme non valide.";
                   break;
           }

           return $result;
       }
}

$controller = new Controller();
