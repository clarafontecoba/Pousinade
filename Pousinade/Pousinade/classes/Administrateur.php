<?php
class Administrateur {
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

