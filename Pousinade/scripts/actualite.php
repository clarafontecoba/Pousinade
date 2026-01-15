<?php
    include ('configuration/config.php');
    include ('../index.php');

    class actualite {
        public $id_actualite = 0;
        public $titre = "";
        public $resume = "" ;
        public $contenu ="" ;
        public $date_publication ="" ;

        public function __construct($i, $t, $r, $c, $d) {
            $this->id_actualite= $i;
            $this->titre= $t;
            $this->resume= $r;
            $this->contenu= $c;
            $this->date_publication= $d;

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Actualités</title>
</head>
<body>
    
</body>
</html>