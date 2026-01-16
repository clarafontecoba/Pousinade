<?php
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
