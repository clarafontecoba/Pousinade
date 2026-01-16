<?php 
// ✅ Classe Database : Gère la connexion et les requêtes à la base de données avec PDO
class database {
    private $hote;
    private $port;
    private $nom_bd;
    private $identifiant;
    private $mot_de_passe;
    private $encodage;
    private $debug=true;
    private $conn;
    public function __construct($hote, $port, $nom_bd, $identifiant, $mot_de_passe, $encodage, $debug) {
        $this->hote=$hote;
        $this->port=$port;
        $this->nom_bd=$nom_bd;
        $this->identifiant=$identifiant;
        $this->mot_de_passe=$mot_de_passe;
        $this->encodage=$encodage;
        $this->debug=$debug;
        try {
            $this->conn = new PDO("mysql:host=$this->hote;port=$this->port;dbname=$this->nom_bd;charset=$this->encodage", $this->identifiant, $this->mot_de_passe);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
    public function getConection(){
        return $this->conn;
    }
    public function query($sql, $params=[]){
        $sth = $this->conn->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}
?>