<?php
    include ('../configuration/config.php');


    class evenement {
        public $id_evenement = 0;
        public $titre = "";
        public $date = "" ;
        public $prix ="" ;
        public $descritpion = "";

        public function __construct($i, $t, $d, $p, $de) {
            $this->id_evenement= $i;
            $this->titre= $t;
            $this->date= $d;
            $this->prix= $p;
            $this->description= $de;
        }
    }

    class image {
        public $id_image = 0;
        public $id_actualite = 0;
        public $nom_fichier = "" ;
        public $chemin ="" ;
        public $texte_alternatif = "";
        public $date_telechargement ="";

        public function __construct($ii, $ia, $n, $ta, $dt) {
            $this->id_image= $ii;
            $this->id_actualite= $ia;
            $this->nom_fichier= $n;
            $this->texte_alternatif= $ta;
            $this->date_telechargement= $dt;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Nos évènements</title>
</head>
<body>
    <section class="ateliers">
    <h2>Nos ateliers</h2>

    <div class="cartes">
        <a href="calligraphiebis.php" class="carte">
            <h3>Calligraphie</h3>
            <img src="../css/images/calligraphie.jpg" alt="Calligraphie">
            <p>Découvrir</p>
        </a>

        <a href="danse.html" class="carte">
            <h3>Danse Renaissance</h3>
            <img src="../css/images/danse.jpg" alt="Danse Renaissance">
            <p>Découvrir</p>
        </a>

        <a href="teinture.html" class="carte">
            <h3>Teinture végétale</h3>
            <img src="../css/images/teinture.jpg" alt="Teinture végétale">
            <p>Découvrir</p>
        </a>

        <a href="tannerie.html" class="carte">
            <h3>Tannerie</h3>
            <img src="../css/images/tannerie.jpg" alt="Tannerie">
            <p>Découvrir</p>
        </a>
    </div>
</section>
</body>
</html>