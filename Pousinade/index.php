<?php

    include ('configuration/config.php');
    include('classes/Database.php');
    include('classes/Actualite.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>La Pousinade - École des Arts Renaissance</title>
    <link rel="icon" type="image/png" href="css/images/favicon.png">
</head>
<body>
<header class="main-header">
    <div class="header-container">
        <div class="logo">
            <img src="css/images/Logo-pousinade-blanc.png" alt="Logo Pousinade">
        </div>

        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="nav-menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="scripts/actualite.php">Nos Actualités</a></li>
                <li><a href="scripts/evenements.php">Évènements</a></li>
            </ul>
        </nav>

        <div class="header-contact">
            <a href="scripts/contact.php">
                Nous contacter <img src="css/images/favicon-phone.png" alt="Téléphone" class="phone-icon">
            </a>
        </div>
    </div>
</header>

    <div class="banniere">
        <div class="texte-banniere">
            <h1>La Pousinade</h1>
            <p>Ecole des Arts Renaissance du Roi de l'Oiseau</p>
        </div>
    </div>

    <h1>L'Association</h1>

    <p>La Pousinade vous accueille tout au long de l’année autour de formations qui vous feront revivre les savoir­-faire du XVIème siècle en vous initiant aux Arts de la Renaissance. Venez ainsi découvrir les mystères de l’herboristerie, les saveurs des mets d’antan ou les spécificités du travail de la laine. A moins que vous ne soyez assez fou pour rejoindre les danseurs, les fidèles guerriers lutteurs ou escrimeurs de notre joyeuse école !</p>

    <p>Notre association La Pousinade (nichée de poussins en occitan) voit le jour en 2011 afin de promouvoir les Fêtes Renaissance du Roi de l’Oiseau.</p>

    <p>Nous sommes des partenaires du Roi de l’Oiseau. A cet effet, nos formations d’initiation sont destinées à tous les bénévoles et membres des associations adhérents au Roi de l’Oiseau. Cette adhésion annuelle incluant l’assurance est de 5 € par an.</p>

    <p>Pour toutes les formations ou stages, l’école de la Pousinade prend en charge la moitié des frais, l’autre moitié restant à la charge du stagiaire sous réserve qu’il s’engage à restituer le savoir-faire acquis durant les fêtes.</p>
    
    <div class="banniereRDO">
        <div class="texte-banniere">
            <h1>Le Roi de l'Oiseau</h1>
            <button class="boutonVisite" onclick="window.location.href = 'https://www.roideloiseau.com/';">Voir le site</button>
        </div>
    </div>
    
    <footer class="main-footer">
  <div class="footer-icons">
    <a href="https://www.facebook.com/roideloiseauofficiel"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/roideloiseauofficiel"><i class="fab fa-instagram"></i></a>
    <a href="mailto:lapousinade@gmail.com"><i class="far fa-envelope"></i></a>
  </div>

  <ul class="footer-links">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="scripts/actualite.php">Nos Actualités</a></li>
    <li><a href="scripts/evenements.php">Évènements</a></li>
    <li><a href="scripts/contact.php">Contact</a></li>
  </ul>

  <div class="footer-legal">
    <a href="#">mentions légales</a>
  </div>

  <div class="footer-scroll">
    <a href="#"><i class="fas fa-arrow-up"></i></a>
  </div>
</footer>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>

</html>