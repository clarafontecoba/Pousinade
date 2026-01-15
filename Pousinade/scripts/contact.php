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
    <link rel="stylesheet" href="../css/styles.css"> 
    <title>Contact</title>
</head>
<body>
     <p>
        <img src="../css/images/tel.svg" alt="Téléphone" width="20" height="20">
        01 23 45 67 89
    </p>
    <p>
        <img src="../css/images/mail.svg" alt="Email" width="20" height="20">
        contact@monasso.fr
    </p>
    <p>
        <img src="../css/images/lieu.svg" alt="Lieu" width="20" height="20">
        12 rue de l'Exemple, 75000 Paris
    </p>
    <h1>Formulaire de contact</h1>

    <form action="#" method="post">
        <p>Votre nom</p>
        <input type="text" name="nom"><br>

        <p>Votre adresse mail</p>
        <input type="email" name="email"><br>

        <p>Objet</p>
        <input type="text" name="objet"><br>

        <p>Votre message</p>
        <textarea></textarea><br>

        <input type="submit" value="Envoyer">
</body>
</html>