<?php
 include_once('../classes/Database.php');
include_once('../classes/Actualite.php');

try {
    // Récupérer toutes les actualités
    $actualites = Actualite::getAllActualites();

    // Afficher les actualités
    foreach ($actualites as $actualite) {
        //echo "ID: " . $actualite->getIdActualite() . "<br>";
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
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Nos Actualités</title>
</head>
<body>
    
</body>
</html>