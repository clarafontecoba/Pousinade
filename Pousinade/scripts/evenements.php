<?php 

include_once('../classes/Database.php');
include_once('../classes/Evenement.php');

// Si demande de liste des événements
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    
    try {
        $evenements = Evenement::getAllEvenements();
        
        foreach ($evenements as $evenement) {
            $titre = $evenement->getTitre();
            $id = $evenement->getIdEvenement();
            
            // Choisir l'image selon le type
            $image = $evenement->getImage();
            
            echo '<a href="javascript:void(0);" class="carte" onclick="afficherDetail(' . $id . ');">';
            echo '    <h1>' . htmlspecialchars($titre) . '</h1>';
            echo '    <img src="' . $image . '" alt="' . htmlspecialchars($titre) . '">';
            echo '    <p>' . htmlspecialchars(substr($evenement->getDescription(), 0, 100)) . '...</p>';
            echo '</a>';
        }
        
    } catch (Exception $e) {
        echo '<p>Erreur : ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    
    exit;
}

// Si demande de détail d'un événement
if (isset($_GET['detail']) && is_numeric($_GET['detail'])) {
    
    try {
        $id = intval($_GET['detail']);
        $evenement = Evenement::getById($id);
        
        if ($evenement) {
            $titre = $evenement->getTitre();
            
            // Choisir l'image
            $image = $evenement->getImage();
            
            echo '<div class="detail-evenement">';
            echo '    <button onclick="retourListe()">← Retour à la liste</button>';
            echo '    <section class="atelier">';
            echo '        <div>';
            echo '            <h2>' . htmlspecialchars($evenement->getTitre()) . '</h2>';
            echo '            <p>' . nl2br(htmlspecialchars($evenement->getDescription())) . '</p>';
            echo '            <p><strong>Date début :</strong> ' . htmlspecialchars($evenement->getDateDebut()) . '</p>';
            echo '            <p><strong>Date fin :</strong> ' . htmlspecialchars($evenement->getDateFin()) . '</p>';
            
            $prix = $evenement->getPrix();
            if ($prix !== null) {
                echo '            <p><strong>Prix :</strong> ' . number_format($prix, 2) . ' €</p>';
            } else {
                echo '            <p><strong>Prix :</strong> Gratuit</p>';
            }
            
            echo '        </div>';
            echo '        <img src="' . $image . '" alt="' . htmlspecialchars($evenement->getTitre()) . '" width="400">';
            echo '    </section>';
            echo '</div>';
        } else {
            echo '<p>Événement non trouvé.</p>';
        }
        
    } catch (Exception $e) {
        echo '<p>Erreur : ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
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
    
    <div id="liste-evenements" class="cartes">
        <p>Chargement des événements...</p>
    </div>
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

<script>
function afficherDetail(id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'evenements.php?detail=' + id, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('liste-evenements').innerHTML = xhr.responseText;
        } else {
            document.getElementById('liste-evenements').innerHTML = '<p>Erreur lors du chargement.</p>';
        }
    };
    
    xhr.send();
}

function retourListe() {
    chargerEvenements();
}

function chargerEvenements() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'evenements.php?ajax=1', true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('liste-evenements').innerHTML = xhr.responseText;
        } else {
            document.getElementById('liste-evenements').innerHTML = '<p>Erreur lors du chargement.</p>';
        }
    };
    
    xhr.onerror = function() {
        document.getElementById('liste-evenements').innerHTML = '<p>Erreur de connexion.</p>';
    };
    
    xhr.send();
}

window.onload = chargerEvenements;
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>