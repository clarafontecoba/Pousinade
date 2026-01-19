<?php 
// Inclusion des classes
include_once('../classes/Database.php');
include_once('../classes/Actualite.php');

// Si demande de liste des actualités
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {

    try {
        $actualites = Actualite::getAllActualites();

        echo '<div class="ensemble-cartes-actus">';

        foreach ($actualites as $actualite) {
            $titre = $actualite->getTitre();
            $id = $actualite->getIdActualite();

            // Choisir l'image selon le type
            $image = '../css/images/calligraphie.jpg';
            if (stripos($titre, 'cours') !== false || stripos($titre, 'poterie') !== false) {
                $image = '../css/images/calligraphie.jpg';
            } elseif (stripos($titre, 'exposition') !== false || stripos($titre, 'céramique') !== false) {
                $image = '../css/images/cuir.png';
            } elseif (stripos($titre, 'stage') !== false || stripos($titre, 'été') !== false) {
                $image = '../css/images/teintures.png';
            }

            echo '<div class="carte-actu" onclick="afficherDetail(' . $id . ')">';
            echo '    <img src="' . $image . '" alt="' . htmlspecialchars($titre) . '" class="actu-image">';
            echo '    <h2 class="actu-titre">' . htmlspecialchars($titre) . '</h2>';
            echo '    <p class="actu-date">' . htmlspecialchars($actualite->getDatePublication()) . '</p>';

            $resume = htmlspecialchars($actualite->getResume() ?? substr($actualite->getContenu(), 0, 100));
            echo '    <p class="actu-resume">' . $resume . '...</p>';

            echo '    <a href="javascript:void(0);" class="actu-btn" onclick="afficherDetail(' . $id . '); event.stopPropagation();">Lire la suite</a>';
            echo '</div>';
        }

        echo '</div>';

    } catch (Exception $e) {
        echo '<p>Erreur : ' . htmlspecialchars($e->getMessage()) . '</p>';
    }

    exit;
}


// Si demande de détail d'une actualité
if (isset($_GET['detail']) && is_numeric($_GET['detail'])) {
    
    try {
        $id = intval($_GET['detail']);
        $actualite = Actualite::getById($id);
        
        if ($actualite) {
            $titre = $actualite->getTitre();
            
            // Choisir l'image
            $image = '../css/images/calligraphie.jpg';
            if (stripos($titre, 'cours') !== false || stripos($titre, 'poterie') !== false) {
                $image = '../css/images/calligraphie.jpg';
            } elseif (stripos($titre, 'exposition') !== false || stripos($titre, 'céramique') !== false) {
                $image = '../css/images/cuir.png';
            } elseif (stripos($titre, 'stage') !== false || stripos($titre, 'été') !== false) {
                $image = '../css/images/teintures.png';
            }
            
            echo '<div class="detail-actualite">';
            echo '    <button onclick="retourListe()">← Retour à la liste</button>';
            echo '    <section class="atelier">';
            echo '        <div>';
            echo '            <h2>' . htmlspecialchars($actualite->getTitre()) . '</h2>';
            echo '            <p>' . nl2br(htmlspecialchars($actualite->getContenu())) . '</p>';
            echo '            <p><em>Publié le : ' . htmlspecialchars($actualite->getDatePublication()) . '</em></p>';
            echo '        </div>';
            echo '        <img src="' . $image . '" alt="' . htmlspecialchars($actualite->getTitre()) . '" width="400">';
            echo '    </section>';
            echo '</div>';
        } else {
            echo '<p>Actualité non trouvée.</p>';
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

<section class="ateliers">
    <h1>NOS ACTUALITÉS</h1>
    
    <div id="liste-actualites" class="cartes">
        <p>Chargement des actualités...</p>
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
    xhr.open('GET', 'actualite.php?detail=' + id, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('liste-actualites').innerHTML = xhr.responseText;
        } else {
            document.getElementById('liste-actualites').innerHTML = '<p>Erreur lors du chargement.</p>';
        }
    };
    
    xhr.send();
}

function retourListe() {
    chargerActualites();
}

function chargerActualites() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'actualite.php?ajax=1', true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('liste-actualites').innerHTML = xhr.responseText;
        } else {
            document.getElementById('liste-actualites').innerHTML = '<p>Erreur lors du chargement.</p>';
        }
    };
    
    xhr.onerror = function() {
        document.getElementById('liste-actualites').innerHTML = '<p>Erreur de connexion.</p>';
    };
    
    xhr.send();
}

window.onload = chargerActualites;
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>