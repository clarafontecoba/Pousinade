<?php

class Database
{
    // Instance unique de la classe
    private static $instance = null;

    // Connexion PDO
    private $connection;

    // Informations de connexion
    private $host;
    private $username;
    private $password;
    private $database;
    private $port;

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct($host,$database,$port,$username,$password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->database};port={$this->port}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion2 à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer l'instance unique
    public static function getInstance($host,$database,$port,$username,$password)
    {
        if (self::$instance === null) {
            self::$instance = new self($host,$database,$port,$username,$password);
        }
        return self::$instance;
    }

    // Méthode pour obtenir la connexion PDO
    public function getConnection()
    {
        return $this->connection;
    }

    // Empêcher le clonage de l'instance
    private function __clone() {}

    // Empêcher la désérialisation de l'instance
    public function __wakeup()
    {
        throw new Exception("Impossible de désérialiser une instance de Database.");
    }
}

