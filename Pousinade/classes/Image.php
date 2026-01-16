<?php
class Image {
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