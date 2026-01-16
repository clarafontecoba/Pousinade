<?php
 include('../classes/Database.php');
include('../classes/Actualite.php');

try {
    // Récupérer toutes les actualités
    $actualites = Actualite::getAllActualites();

    // Afficher les actualités
    foreach ($actualites as $actualite) {
        echo "ID: " . $actualite->getIdActualite() . "<br>";
        echo "Titre: " . $actualite->getTitre() . "<br>";
        echo "Résumé: " . $actualite->getResume() . "<br>";
        echo "Contenu: " . substr($actualite->getContenu(), 0, 100) . "...<br>";
        echo "Date: " . $actualite->getDatePublication() . "<br><br>";
    }



    // Récupérer toutes les actualités
    $actualite = Actualite::getById(2);
    echo "Titre de l'act 2: : " . $actualite->getTitre() . "<br>";


} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> 
    <title>Nos Actualités</title>
</head>
<body>
    <h1>Actualités</h1>
    <?php
    if (count($actualites) > 0) {
        foreach ($actualites as $actualite) {
            echo "<div>";
            echo "<h2>" . $actualite->titre . "</h2>";
            echo "<p><strong>Publié le :</strong> " . $actualite->date_publication . "</p>";
            echo "<p><em>" . $actualite->resume . "</em></p>";
            echo "<p>" . $actualite->contenu . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucune actualité à afficher.</p>";
    }
    ?>
</body>
<footer>   
    <a href="index.php">Acceuil</a>
    <a href="evenements.php">Evénement</a>
    <a href="contact.php">Contact</a>
</footer>
</html>