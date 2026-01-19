<?php

class Database
{
    // Instance unique de la classe
    private static $instance = null;

    // Connexion PDO
    private $connection;

    // Informations de connexion
    private $host = 'localhost';
    private $username = 'user';
    private $password = 'user';
    private $database = 'pousinade';
    private $port='3306';

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {
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
            catch (PDOException $e) {
            http_response_code(404);
            include __DIR__ . '/../scripts/erreur404.php';
            exit;
}

        }
    }

    // Méthode pour récupérer l'instance unique
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
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

