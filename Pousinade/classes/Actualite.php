<?php

class Actualite {
    private $id_actualite;
    private $titre;
    private $resume;
    private $contenu;
    private $date_publication;

    public function __construct(
        int $id_actualite = null,
        string $titre = '',
        ?string $resume = null,
        string $contenu = '',
        string $date_publication = ''
    ) {
        $this->id_actualite = $id_actualite;
        $this->titre = $titre;
        $this->resume = $resume;
        $this->contenu = $contenu;
        $this->date_publication = $date_publication;
    }

    // Getters
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


    // Méthode pour récupérer toutes les actualités
    public static function getAllActualites(): array
    {
        
        $db = Database::getInstance();
        $connection = $db->getConnection();

        try {
            $stmt = $connection->query("SELECT * FROM actualite ORDER BY date_publication DESC");
            $actualites = [];
            while ($row = $stmt->fetch()) {
                $actualite = new Actualite(
                    $row['id_actualite'],
                    $row['titre'],
                    $row['resume'],
                    $row['contenu'],
                    $row['date_publication']
                );
                
                $actualites[] = $actualite;
            }
        
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }

        return $actualites;
    }

    // Méthode pour récupérer une actualité par son ID
    public static function getById(int $id_actualite): ?Actualite
    {
        $db = Database::getInstance();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM actualite WHERE id_actualite = :id_actualite");
        $stmt->bindParam(':id_actualite', $id_actualite, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();
        if (!$row) {
            return null; // Retourne null si aucune actualité n'est trouvée
        }

        return new Actualite(
            $row['id_actualite'],
            $row['titre'],
            $row['resume'],
            $row['contenu'],
            $row['date_publication']
        );
    }
}

?>