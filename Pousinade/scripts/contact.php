<?php
    include ('../configuration/config.php');



    class contact {
        public $id_message = 0;
        public $nom = "";
        public $prenom = "" ;
        public $courriel ="" ;
        public $message ="" ;
        public $date_envoi = "";
        public $objet ="" ;

        public function __construct($i, $n, $p, $c, $m, $d, $o) {
            $this->id_message= $i;
            $this->nom= $n;
            $this->prenom= $p;
            $this->courriel= $c;
            $this->message= $m;
            $this->date_envoi= $d;
            $this->objet= $o;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Contact</title>
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
    <h1>Nous contacter</h1>
     <p>
        <img src="../css/images/tel.svg" alt="Téléphone" width="20" height="20">
         04 71 09 38 41
    </p>
    <p>
        <img src="../css/images/arobase.svg" alt="Email" width="20" height="20">
        lapousinade@gmail.com
    </p>
    <p>
        <a href="https://www.google.com/maps/place/29+Rue+Raphaël,+43000+Le+Puy-en-Velay/@45.0446238,3.8798594,17z/data=!3m1!4b1!4m6!3m5!1s0x47f5fa550fcfd79f:0x1131a93da8f6b5f9!8m2!3d45.0446238!4d3.8824343!16s%2Fg%2F11c3q4j690?entry=ttu&g_ep=EgoyMDI2MDExMS4wIKXMDSoKLDEwMDc5MjA2N0gBUAM%3D">
        <img src="../css/images/localisation.svg" alt="Lieu" width="20" height="20">
        29 rue Raphaël – 43000 LE PUY-EN-VELAY
    </a>
</p>
    <h1>Formulaire de contact</h1>


    <form action="Contact.php" method="post" class="formulaire">
        <p>Votre nom</p>
        <input type="text" name="nom" placeholder="Jean Dupont"><br>

        <p>Votre adresse mail</p>
        <input type="email" name="email" placeholder="jean@gmail.com"><br>

        <p>Objet</p>
        <input type="text" name="objet"><br>

        <p>Votre message</p>
        <textarea></textarea><br>

        <input  class = "boutonEnvoyer" type="submit" value="Envoyer">
    </form>    

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