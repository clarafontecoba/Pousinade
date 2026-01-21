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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $courriel = $_POST['email'] ?? '';
    $objet = $_POST['objet'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=db_pousinade;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $sql = "INSERT INTO contact 
                (nom, prenom, courriel, message, date_envoi, objet)
                VALUES (:nom, :prenom, :courriel, :message, NOW(), :objet)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':courriel' => $courriel,
            ':message' => $message,
            ':objet' => $objet
        ]);

        echo "Votre message a bien été transmis";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>