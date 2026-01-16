<?php
    include ('configuration/config.php');
    include ('class/class_database.php');
    $db = new database($hote, $port, $nom_bd, $identifiant, $mot_de_passe, $encodage, $debug);
    $sql = "SELECT * FROM actualite ORDER BY date_publication DESC";
    $actualites = $db->query($sql);
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