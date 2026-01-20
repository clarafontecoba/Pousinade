<?php 
include_once('../classes/Database.php');
include_once('../classes/Actualite.php');

// Si l'utilisateur clique sur une carte, ce bloc s'exécute

if (isset($_GET['detail']) && is_numeric($_GET['detail'])) {
    
    try {
        $id = intval($_GET['detail']);
        $actualite = Actualite::getById($id);
        
        if ($actualite) {
            // Utiliser getImage() pour récupérer l'image depuis la BDD
            $image = $actualite->getImage();
            
            echo '<div class="detail-actualite">';
            echo '    <button onclick="retourListe()" style="margin: 20px; padding: 10px 20px; cursor: pointer;">Retour à la liste</button>';
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
    
    <!-- Conteneur où les actualités seront chargées dynamiquement via l'API -->
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
// Cette fonction appelle l'API pour récupérer toutes les actualités et les affiche sous forme de cartes (triées pars l'api)
function chargerActualites() {
    var xhr = new XMLHttpRequest();
    
    // Appel de l'API pour récupérer toutes les actualités
    xhr.open('GET', '../api/ApiActuRecente.php?limit=100', true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                var actualites = JSON.parse(xhr.responseText);
                
                if (actualites.length === 0) {
                    document.getElementById('liste-actualites').innerHTML = '<p>Aucune actualité disponible.</p>';
                    return;
                }
                
                // Générer le HTML pour chaque actualité
                var html = '';
                actualites.forEach(function(actu) {
                    var titre = actu.titre;
                    var id = actu.id_actualite;
                    
                    var image = actu.image || '../css/images/calligraphie.jpg';
                    
                    html += '<a href="javascript:void(0);" class="carte" onclick="afficherDetail(' + id + ')">';
                    html += '    <h1>' + titre + '</h1>';
                    html += '    <img src="' + image + '" alt="' + titre + '">';
                    
                    var texte = actu.resume || actu.contenu.substring(0, 100);
                    html += '    <p>' + texte + '...</p>';
                    html += '</a>';
                });
                
                document.getElementById('liste-actualites').innerHTML = html;
                
            } catch (e) {
                document.getElementById('liste-actualites').innerHTML = '<p>Erreur lors du traitement des données.</p>';
            }
        } else {
            document.getElementById('liste-actualites').innerHTML = '<p>Erreur lors du chargement des actualités.</p>';
        }
    };
    
    xhr.onerror = function() {
        document.getElementById('liste-actualites').innerHTML = '<p>Erreur de connexion.</p>';
    };
    
    xhr.send();
}

// fonction utilisé pour le détail des carte (clique)

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

// Recharge les actualités depuis l'API

function retourListe() {
    chargerActualites();
}

// Appeler l'API pour charger les actualités dès que la page est prête

window.onload = function() {
    chargerActualites();
};
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>