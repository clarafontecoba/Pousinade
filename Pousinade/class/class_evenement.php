<?php
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
?>