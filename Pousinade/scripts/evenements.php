<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Nos évènements</title>
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
    <section class="ateliers">
        <h1>NOS ATELIERS</h1>

        <div class="cartes">
            <a href="calligraphiebis.php" class="carte">
                <h1>Calligraphie</h1>
                <img src="../css/images/calligraphie.jpg" alt="Calligraphie">
                <p>Découvrir</p>
            </a>

            <a href="danse.php" class="carte">
                <h1>Danse Renaissance</h1>
                <img src="../css/images/danse.png" alt="Danse Renaissance">
                <p>Découvrir</p>
            </a>

            <a href="teinture.php" class="carte">
                <h1>Teinture vegetale</h1>
                <img src="../css/images/teintures.png" alt="Teinture végétale">
                <p>Découvrir</p>
            </a>

            <a href="tannerie.php" class="carte">
                <h1>Tannerie</h1>
                <img src="../css/images/cuir.png" alt="Tannerie">
                <p>Découvrir</p>
            </a>
        </div>
    </section>

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