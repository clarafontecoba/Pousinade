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
    
</body>
</html>