<?php
class Contact {
    public $id_message = 0;
    public $nom = "";
    public $prenom = "" ;
    public $courriel ="" ;
    public $message ="" ;
    public $date_envoi = "";
    public $objet ="" ;

    public function __construct($i, $n, $p, $c, $m, $d, $o) {
        $this->id_message= $i;
        $this->nom= $n;
        $this->prenom= $p;
        $this->courriel= $c;
        $this->message= $m;
        $this->date_envoi= $d;
        $this->objet= $o;
    }
}
?>