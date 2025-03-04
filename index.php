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

    <?php
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
           $phrase = htmlspecialchars($_POST["phrase"]);
       }
    ?>
     <script src="script.js"></script>
</body>
</html>
