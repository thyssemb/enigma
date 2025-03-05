<?php

require_once __DIR__ . '/../../src/cesar.php';
require_once __DIR__ . '/../../src/vigenere.php';
require_once __DIR__ . '/../../src/one_time_pad.php';

use App\Chiffrement\Cesar;
use App\Chiffrement\Vigenere;
use App\Chiffrement\OneTimePad;

/**
 * Controller qui redirige dans le bon service d'algo
 */

class Controller {

    private $allowedMethods = ['POST'];

    public function handleRequest() {
        if (!in_array($_SERVER['REQUEST_METHOD'], $this->allowedMethods)) {
            $this->sendResponse(405, ["error" => "Méthode non autorisée."]);
            return;
        }
        $algo = $_POST['algo'];
        $char = $_POST['char'];
        $key = $_POST['key'];

        if (!$algo || !$char || !$key) {
            echo "Paramètres manquants.";
            return;
        }

        switch ($algo) {
            case 'cesar':
                $cesar = new Cesar($key, $char);
                echo $cesar->chiffrement($char);
                break;
            case 'vigenere':
                $vigenere = new Vigenere($key);
                echo $vigenere->chiffrement($char);
                break;
            case 'masque_jetable':
                $otp = new OneTimePad($key);
                echo $otp->chiffrement($char);
                break;
            default:
                echo "Algorithme non valide.";
        }
    }
}

$controller = new Controller();
$controller->handleRequest();
