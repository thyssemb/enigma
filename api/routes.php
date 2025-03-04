<?php

use App\Chiffrement\Cesar;
use App\Chiffrement\Vigenere;
use App\Chiffrement\OneTimePad;

/**
 * Point d'entrée des routes allant dans les différents services suivant l'algo choisi par l'user
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'algorithme choisi
    $algo = $_POST['algo'];
    $phrase = $_POST['phrase'];
    $key = $_POST['key'];

    // Rediriger vers le contrôleur qui gère cet algo
    switch ($algo) {
        case 'cesar':
            require_once 'controller.php';
            $controller = new Controller();
            $controller->handleCesar($phrase, $key);
            break;
        case 'vigenere':
            require_once 'controller.php';
            $controller = new Controller();
            $controller->handleVigenere($phrase, $key);
            break;
        case 'masque_jetable':
            require_once 'controller.php';
            $controller = new Controller();
            $controller->handleMasqueJetable($phrase, $key);
            break;
        default:
            echo "Algorithme non valide.";
    }
}
