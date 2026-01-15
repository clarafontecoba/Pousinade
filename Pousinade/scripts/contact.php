<?php
    include ('../configuration/config.php');



    class contact {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    
</body>
</html>