<?php
    include ('configuration/config.php');

    class administrateur {
        public $id_administrateur = 0;
        public $mot_de_passe = "";
        public $courriel = "" ;

        public function __construct($i, $m, $c) {
            $this->id_actualite= $i;
            $this->mot_de_passe= $m;
            $this->courriel= $c;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> 
    <title>Page d'accueil</title>
</head>
<body>

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
</body>
</html>