<?php
include_once('../configuration/config.php');

class Evenement {
    public $id_evenement = 0;
    public $titre = "";
    public $date = "" ;
    public $prix ="" ;
    public $descritpion = "";

        // Constructeur
    public function __construct(
        int $id_evenement = null,
        string $titre = '',
        string $date_debut = '',
        string $date_fin = '',
        ?float $prix = null,
        ?string $description = null
    ) {
        $this->id_evenement = $id_evenement;
        $this->titre = $titre;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->prix = $prix;
        $this->description = $description;
    }

    // Getters
    public function getIdEvenement(): int
    {
        return $this->id_evenement;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDateDebut(): string
    {
        return $this->date_debut;
    }

    public function getDateFin(): string
    {
        return $this->date_fin;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    // Méthode pour récupérer tous les événements
    public static function getAllEvenements(): array
    {
        $config = new Config();
        $db = Database::getInstance($config->host,$config->database,$config->port,$config->username,$config->password);
        $connection = $db->getConnection();

        $stmt = $connection->query("SELECT * FROM evenement ORDER BY date_debut ASC");
        $evenements = [];

        while ($row = $stmt->fetch()) {
            $evenement = new Evenement(
                $row['id_evenement'],
                $row['titre'],
                $row['date_debut'],
                $row['date_fin'],
                $row['prix'],
                $row['description']
            );
            $evenements[] = $evenement;
        }

        return $evenements;
    }

    // Méthode pour récupérer un événement par son ID
    public static function getById(int $id_evenement): ?Evenement
    {
        $config = new Config();
        $db = Database::getInstance($config->host,$config->database,$config->port,$config->username,$config->password);
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM evenement WHERE id_evenement = :id_evenement");
        $stmt->bindParam(':id_evenement', $id_evenement, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();
        if (!$row) {
            return null; // Retourne null si aucun événement n'est trouvé
        }

        return new Evenement(
            $row['id_evenement'],
            $row['titre'],
            $row['date_debut'],
            $row['date_fin'],
            $row['prix'],
            $row['description']
        );
    }
}
?>