<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calligraphie</title>
        <link rel="stylesheet" href="../css/styles.css">
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

    <h1>Nos ateliers</h1>

    <section class="atelier">
        <h2>Calligraphie</h2>

        <p>
            Un travail personnel en dehors des cours sera nécessaire pour
            évoluer dans cette pratique. Le matériel nécessaire durant les
            cours sera mis à votre disposition.
        </p>

        <p>Débutant / intermédiaire</p>

        <p>48€ + 5€ d’adhésion</p>

        <p>Le jeudi de 17h30 à 20h30</p>

        <p>Centre Pierre Cardinal – Le Puy en Velay</p>

        <img src="../css/images/calligraphie.jpg" alt="Atelier calligraphie" width="400">
    </section>

    <?php include('../classes/Database.php');
include('../classes/Evenement.php'); 
try {
    $evenements = Evenement::getAllEvenements();
    foreach ($evenements as $evenement) {

        $evenement->getTitre();
        $evenement->getDateDebut();
        $evenement->getDateFin();
        $evenement->getPrix()  ;
        $evenement->getDescription();
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
    
<section class="pageateliers">
        <?php foreach ($evenements as $evenement) : ?>
            <?php if ($evenement->getIdEvenement() == 5) : ?>
                <h1>
                    <?php echo htmlspecialchars($evenement->getTitre()); ?>
                </h1>

                <img src="../css/images/calligraphie.jpg" alt="Calligraphie" class="image-atelier">

                <div class="infos">
                    <div class="info">
                        <img src="../css/images/calendrier.svg" alt="" class="icon">
                        <p><?php echo htmlspecialchars($evenement->getDateDebut()); ?></p>
                    </div>

                    <div class="info">
                        <img src="../css/images/euro.svg" alt="" class="icon">
                        <p><?php echo htmlspecialchars($evenement->getPrix() ?? 'Gratuit'); ?></p>
                    </div>
                </div>

                <p class="description">
                    <?php echo substr(htmlspecialchars($evenement->getDescription()), 0, 100); ?>...
                </p>

                <p class="decouvrir">Découvrir</p>
            <?php endif; ?>
        <?php endforeach; ?>

</section>

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
