<?php

include('../classes/Database.php');
include('../classes/Evenement.php');

try {
    $evenements = Evenement::getAllEvenements();
    foreach ($evenements as $evenement) {
        echo "ID: " . $evenement->getIdEvenement() . "<br>";
        echo "Titre: " . $evenement->getTitre() . "<br>";
        echo "Date de début: " . $evenement->getDateDebut() . "<br>";
        echo "Date de fin: " . $evenement->getDateFin() . "<br>";
        echo "Prix: " . ($evenement->getPrix() ?? 'Gratuit') . " €<br>";
        echo "Description: " . substr($evenement->getDescription(), 0, 100) . "...<br><br>";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Nos évènements</title>
</head>
<body>
    <section class="ateliers">
    <h2>Nos ateliers</h2>

    <div class="cartes">
        <a href="calligraphiebis.php" class="carte">
            <h3>Calligraphie</h3>
            <img src="../css/images/calligraphie.jpg" alt="Calligraphie">
            <p>Découvrir</p>
        </a>

        <a href="danse.html" class="carte">
            <h3>Danse Renaissance</h3>
            <img src="../css/images/danse.png" alt="Danse Renaissance">
            <p>Découvrir</p>
        </a>

        <a href="teinture.html" class="carte">
            <h3>Teinture végétale</h3>
            <img src="../css/images/teintures.png" alt="Teinture végétale">
            <p>Découvrir</p>
        </a>

        <a href="tannerie.html" class="carte">
            <h3>Tannerie</h3>
            <img src="../css/images/cuir.png" alt="Tannerie">
            <p>Découvrir</p>
        </a>
    </div>
</section>
</body>
</html>