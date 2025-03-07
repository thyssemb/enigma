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

    public function handleRequest($algo, $char, $key)
       {
           $result = '';

           switch ($algo) {
               case 'cesar':
                   $cesar = new Cesar($key, $char);
                   $result = $cesar->chiffrement($char);
                   break;
               case 'vigenere':
                   $vigenere = new Vigenere($key, $char);
                   $result = $vigenere->chiffrement($char);
                   break;
               case 'masque_jetable':
                   $otp = new OneTimePad($key, $char);
                   $result = $otp->chiffrement($char);
                   break;
               default:
                   $result = "Algorithme non valide.";
                   break;
           }

           return $result;
       }
}

$controller = new Controller();
$controller->handleRequest($algo, $char, $key);
