<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Nos Actualités</title>
</head>
<body>
<header class="main-header">
    <div class="header-container">
        <div class="logo">
            <img src="../css/images/Logo-pousinade-blanc.png" alt="Logo Pousinade">
        </div>

        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="nav-menu">
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="actualite.php">Nos Actualités</a></li>
                <li><a href="evenements.php">Évènements</a></li>
            </ul>
        </nav>

        <div class="header-contact">
            <a href="contact.php">
                Nous contacter <img src="../css/images/favicon-phone.png" alt="Téléphone" class="phone-icon">
            </a>
        </div>
    </div>
</header>

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

<?php
try {
    $actualites = Actualite::getAllActualites();
    ?>

    <section class="actualites">
        <h1>NOS ACTUALITÉS</h1>

        <div class="ensemble-cartes-actus">
            <?php foreach ($actualites as $actualite) : ?>
                
                <div class="carte-actu">
                    <h2 class="actu-titre">
                        <?php echo htmlspecialchars($actualite->getTitre()); ?>
                    </h2>

                    <p class="actu-date">
                        <?php echo htmlspecialchars($actualite->getDatePublication()); ?>
                    </p>

                    <p class="actu-resume">
                        <?php echo htmlspecialchars($actualite->getResume()); ?>
                    </p>

                    <p class="actu-contenu">
                        <?php echo substr(htmlspecialchars($actualite->getContenu()), 0, 100); ?>...
                    </p>

                    <a href="actualite.php?id=<?php echo $actualite->getIdActualite(); ?>" class="actu-btn">
                        Lire la suite
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </section>

<?php
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



<footer class="main-footer">
  <div class="footer-icons">
    <a href="https://www.facebook.com/roideloiseauofficiel"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/roideloiseauofficiel"><i class="fab fa-instagram"></i></a>
    <a href="mailto:lapousinade@gmail.com"><i class="far fa-envelope"></i></a>
  </div>

  <ul class="footer-links">
    <li><a href="../index.php">Accueil</a></li>
    <li><a href="actualite.php">Nos Actualités</a></li>
    <li><a href="evenements.php">Évènements</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>

  <div class="footer-legal">
    <a href="mentionslegales.php">mentions légales</a>
  </div>

  <div class="footer-scroll">
    <a href="#"><i class="fas fa-arrow-up"></i></a>
  </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>