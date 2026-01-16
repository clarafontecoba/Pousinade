<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> 
    <title>Nos évènements</title>
</head>
<body>
    <section class="ateliers">
        <h2>Nos ateliers</h2>

        <div class="cartes">
            <a href="calligraphiebis.php" class="carte">
                <h3>Calligraphie</h3>
                <img src="css/images/calligraphie.jpg" alt="Calligraphie">
                <p>Découvrir</p>
            </a>

            <a href="danse.html" class="carte">
                <h3>Danse Renaissance</h3>
                <img src="css/images/danse.jpg" alt="Danse Renaissance">
                <p>Découvrir</p>
            </a>

            <a href="teinture.html" class="carte">
                <h3>Teinture végétale</h3>
                <img src="css/images/teinture_vegetale.jpg" alt="Teinture végétale">
                <p>Découvrir</p>
            </a>

            <a href="tannerie.html" class="carte">
                <h3>Tannerie</h3>
                <img src="css/images/cuir.jpg" alt="Tannerie">
                <p>Découvrir</p>
            </a>
        </div>
    </section>
    <section class="evenements">
        <h2>Nos événements</h2>
        <div id="liste-evenements">
            <p>Chargement des événements...</p>
        </div>
    </section>
    <script>
        function chargerEvenements() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('liste-evenements').innerHTML = xhr.responseText;
                }
            };

            xhr.open('GET', 'configuration/get_evenements.php', true);
            xhr.send();
        }
        window.onload = chargerEvenements;
    </script>
</body>
<footer>
    <a href="index.php">Acceuil</a>
    <a href="actualite.php">Actualité</a>
    <a href="contact.php">Contact</a>
</footer>
</html>