<?php
include_once("../configuration/config.php");


class Actualite {
    private $id_actualite;
    private $titre;
    private $resume;
    private $contenu;
    private $date_publication;
    
    public function getIdActualite(): int
    {
        return $this->id_actualite;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getDatePublication(): string
    {
        return $this->date_publication;
    }

    // Récupérer l'image liée à l'actualité depuis la BDD
    public function getImage(): string
    {
        $config = new Config();
        $db = Database::getInstance($config->host,$config->database,$config->port,$config->username,$config->password);
        $connection = $db->getConnection();

        $stmt = $connection->prepare("
            SELECT i.chemin 
            FROM image i
            INNER JOIN image_actualite ia ON i.id_image = ia.id_image
            WHERE ia.id_actualite = :id_actualite
            LIMIT 1
        ");
        $stmt->bindParam(':id_actualite', $this->id_actualite, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch();
        
        // Retourner le chemin de l'image ou une image par défaut
        return $result ? $result['chemin'] : '../css/images/calligraphie.jpg';
    }


    // Méthode pour récupérer toutes les actualités
    public static function getAllActualites(): array
    {
        
        $config = new Config();
        $db = Database::getInstance($config->host,$config->database,$config->port,$config->username,$config->password);
        $connection = $db->getConnection();
       
        try {
            $stmt = $connection->query("SELECT * FROM actualite ORDER BY date_publication DESC");
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actualite::class);
            $actualites = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $actualites;
    }

    // Méthode pour récupérer une actualité par son ID
    public static function getById(int $id_actualite): ?Actualite
    {
        $config = new Config();    
        $db = Database::getInstance($config->host,$config->database,$config->port,$config->username,$config->password);
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM actualite WHERE id_actualite = :id_actualite");
        $stmt->bindParam(':id_actualite', $id_actualite, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actualite::class);
        $act = $stmt->fetch();
        if (!$act) {
            return null;
        }
        return $act;
    }
}

?>