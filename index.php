<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Enigma</title>
</head>
<body>
    <form method="post">
        <h1>Enigma</h1>

        <select name="algo" id="algo" required>
            <option value="" disabled selected>Choisissez un algorithme de chiffrement</option>
            <option value="cesar">César</option>
            <option value="vigenere">Chiffre de Vigenère</option>
            <option value="masque_jetable">Masque jetable</option>
        </select>

        <input type="text" name="phrase" placeholder="Entrez une phrase" required>

        <div id="key-container" style="display: none;">
            <input type="text" name="key" id="key" placeholder="Entrez une clé" required>
        </div>

        <button type="submit">Envoyer</button>
    </form>

  <section id="backend-explanation">
      <h2>Comment fonctionne la logique de chiffrement ?</h2>
      <p>
          Le backend de l'application Enigma repose sur des algorithmes de chiffrement traditionnels tels que César, Vigenère et Masque Jetable.
          Lorsqu'une phrase et un algorithme sont choisis, la requête est d'abord traitée par une route spécifique, qui oriente ensuite la requête vers le service approprié. Chaque algorithme possède sa propre classe, regroupée sous un même namespace.
      </p>
      <p>
          La structure est pensée pour être simple et modulaire : chaque algorithme dispose d'une classe dédiée dans le répertoire <code>src/</code>, et le contrôleur choisit quel service utiliser en fonction de l'algorithme sélectionné par l'utilisateur.
      </p>
  </section>


    <?php
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
           $phrase = htmlspecialchars($_POST["phrase"]);
       }
    ?>
     <script src="script.js"></script>
</body>
</html>
