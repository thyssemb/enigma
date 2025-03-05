<?php

require_once '../src/Cesar.php';
require_once '../src/Vigenere.php';
require_once '../src/OneTimePad.php';

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
        $phrase = $_POST['phrase'];
        $key = $_POST['key'];

        if (!$algo || !$phrase || !$key) {
            echo "Paramètres manquants.";
            return;
        }

        switch ($algo) {
            case 'cesar':
                $cesar = new Cesar($key);
                echo $cesar->chiffrer($phrase);
                break;
            case 'vigenere':
                $vigenere = new Vigenere($key);
                echo $vigenere->chiffrer($phrase);
                break;
            case 'masque_jetable':
                $otp = new OneTimePad($key);
                echo $otp->chiffrer($phrase);
                break;
            default:
                echo "Algorithme non valide.";
        }
    }
}

$controller = new Controller();
$controller->handleRequest();
